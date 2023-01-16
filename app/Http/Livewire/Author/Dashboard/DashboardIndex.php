<?php

namespace App\Http\Livewire\Author\Dashboard;

use App\Models\Post;
use Livewire\Component;

class DashboardIndex extends Component
{
  public function render()
  {
    return view('livewire.author.dashboard.dashboard-index', [
      'total_posts' => Post::where('user_id', \Auth::user()->id)->count(),
      'total_post_unpublish' => Post::where('user_id', \Auth::user()->id)
        ->where('status', 'unpublish')
        ->count(),
      'total_post_publish' => Post::where('user_id', \Auth::user()->id)
        ->where('status', 'publish')
        ->count(),
      'posts' => Post::where('user_id', \Auth::user()->id)->latest()->paginate(5)
    ])
      ->extends('layouts.dashboard.index')
      ->section('content');
  }
}
