<?php

namespace App\Http\Livewire\Author\Stories;

use Livewire\Component;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;
use Livewire\WithPagination;

class StoriesIndex extends Component
{
  use WithPagination;

  protected $paginationTheme = 'bootstrap';
  public $search;
  public $status;
  public $category_select;
  protected $queryString = [
    'search' => ['except' => ''],
    'status' => ['except' => ''],
    'category_select' => ['except' => ''],
  ];

  public function deletePosts($id)
  {
    $posts = Post::where('user_id', \Auth::user()->id)->findOrFail($id);

    if (\File::exists('storage/story/' . $posts->post_cover)) {
      \File::delete('storage/story/' . $posts->post_cover);
    };
    $posts->delete();

    return redirect()
      ->back()
      ->with('success', 'Success Delete Story');
  }

  protected function getAllStoriesByUser()
  {
    $stories = \Cache::remember('stories.all', now()->addMinutes(120), function () {
      return Post::when($this->search, function (Builder $query) {
        $query->where('post_title', 'like', '%' . trim($this->search) . '%');
      })->when($this->status, function (Builder $query) {
        $query->where('status', $this->status);
      })->when($this->category_select, function (Builder $query) {
        $query->whereHas('category', function (Builder $q) {
          $q->where('category_name', 'like', '%' . trim($this->category_select) . '%');
        });
      })->where('user_id', \Auth::user()->id)->with('category')->latest()->get();
    });

    return $stories;
  }

  public function render()
  {
    return view('livewire.author.stories.stories-index', [
      'posts' => $this->getAllStoriesByUser(),
      'posts_count' => Post::where('user_id', \Auth::user()->id)->count(),
      'category' => PostCategory::all(),
    ])
      ->extends('layouts.dashboard.index')
      ->section('content');
  }
}
