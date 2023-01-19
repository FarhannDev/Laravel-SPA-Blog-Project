<?php

namespace App\Http\Livewire\Author\Stories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class StoriesSearch extends Component
{
  public $search;
  protected $queryString = [
    'search' => ['except' => ''],
  ];

  public function render()
  {
    $data = Post::when($this->search, function (Builder $builder) {
      $builder->where('post_title', 'like', '%' . trim($this->search) . '%');
    })->latest()->get();

    return view('livewire.author.stories.stories-search', [
      'posts' => $data,
    ])
      ->extends('layouts.dashboard.index')
      ->section('content');
  }
}
