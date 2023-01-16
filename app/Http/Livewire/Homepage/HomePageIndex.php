<?php

namespace App\Http\Livewire\Homepage;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Livewire\Component;

class HomePageIndex extends Component
{
  public $search;
  public $category;
  public $publish;
  protected $queryString = [
    'search' => ['except' => ''],
  ];

  public function render(Request $request)
  {
    $data = Post::with('category')
      ->when($this->search, function (Builder $query) {
        $query->where('post_title', 'like', '%' . $this->search . '%');
      })
      ->when($this->category, function (Builder $query) {
        $query->whereHas('category', function (Builder $q) {
          $q->where('category_name', $this->category);
        });
      })
      ->when($this->publish, function (Builder $q) {
        $q->where('publish_date', $this->publish);
      })->latest()->paginate(20);

    return view('livewire.homepage.home-page-index', [
      'posts' => $data,
      'category_posts' => PostCategory::all(),
    ])
      ->extends('layouts.dashboard.index')
      ->section('content');
  }
}
