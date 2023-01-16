<?php

namespace App\Http\Livewire\Stories;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
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
      })->where('user_id', \Auth::user()->id)->with('category')->latest()->get();

    return view('livewire.stories.stories-index', [
      'posts' => Post::where('user_id', \Auth::user()->id)
        ->with('category')
        ->latest()
        ->get(),
      'posts_count' => Post::where('user_id', \Auth::user()->id)->count(),
      'category' => PostCategory::all(),
    ])
      ->extends('layouts.dashboard.index')
      ->section('content');
  }
}
