<?php

namespace App\Http\Livewire\Homepage;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Livewire\Component;

class HomePageIndex extends Component
{

  public function render(Request $request)
  {

    return view('livewire.homepage.home-page-index', [
      'posts' => Post::where('status', 'publish')->paginate(20),
      'category_posts' => PostCategory::all(),
    ])
      ->extends('layouts.dashboard.index')
      ->section('content');
  }
}
