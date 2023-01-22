<?php

namespace App\Http\Livewire\Author\Stories;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class StoriesSearch extends Component
{
  public $query;
  public $category;
  protected $queryString = [
    'query' => ['except' => ''],
  ];

  public function render()
  {
    $data = Post::with('category')
      ->when($this->query, function (Builder $query) {
        $query->where('post_title', 'like', '%' . trim($this->query) . '%');
        $query->where('status', 'publish');
      })
      ->when($this->category, function (Builder $query) {
        $query->whereHas('category', function (Builder $q) {
          $q->where('category_name', $this->category);
        });
      })->latest()->paginate(20);

    return view('livewire.author.stories.stories-search', [
      'posts' => $data,
      'categories' => PostCategory::all(),
    ])
      ->extends('layouts.dashboard.index')
      ->section('content');
  }
}
