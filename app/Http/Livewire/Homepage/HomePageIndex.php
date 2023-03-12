<?php

namespace App\Http\Livewire\Homepage;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class HomePageIndex extends Component
{

  protected function getAllStoriesInBeranda()
  {
    $stories = \Cache::remember('stories.all', now()->addMinutes(120), function () {
      return Post::where('status', 'publish')->latest()->get();
    });

    return $stories;
  }

  public function render()
  {
    return view('livewire.homepage.home-page-index', [
      'posts' => $this->getAllStoriesInBeranda(),
      'latest' => Post::where('status', 'publish')->inRandomOrder()->limit(5)->get(),
      'category_posts' => PostCategory::all(),
      'page_title' => 'Beranda',
    ])
      ->extends('layouts.dashboard.index')
      ->section('content');
  }
}
