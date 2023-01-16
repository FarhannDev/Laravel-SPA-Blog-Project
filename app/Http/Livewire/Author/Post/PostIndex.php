<?php

namespace App\Http\Livewire\Author\Post;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class PostIndex extends Component
{
  use WithPagination;

  protected $paginationTheme = 'bootstrap';
  public $sorting = 5;
  public $search;
  public $status;
  public $category_select;
  protected $queryString = [
    'search' => ['except' => ''],
    'sorting' => ['except' => ''],
    'status' => ['except' => ''],
    'category_select' => ['except' => ''],
  ];

  public function deletePosts($id)
  {
    $posts = Post::where('user_id', \Auth::user()->id)->findOrFail($id);

    if (\File::exists('storage/posts/' . $posts->post_cover)) {
      \File::delete('storage/posts/' . $posts->post_cover);
    };
    $posts->delete();

    return redirect()
      ->back()
      ->with('success', 'Berhasil Menghapus Postingan');
  }

  public function render()
  {

    $data = Post::when($this->search, function (Builder $query) {
      $query->where('post_title', 'like', '%' . trim($this->search) . '%');
    })
      ->when($this->status, function (Builder $query) {
        $query->where('status', $this->status);
      })
      ->when($this->category_select, function (Builder $query) {
        $query->whereHas('category', function (Builder $q) {
          $q->where('category_name', 'like', '%' . trim($this->category_select) . '%');
        });
      })->where('user_id', \Auth::user()->id)->with('category')->latest()->paginate($this->sorting);

    return view('livewire.author.post.post-index', [
      'posts' => $data,
      'category' => PostCategory::all(),

    ])
      ->extends('layouts.dashboard.index')
      ->section('content');
  }
}
