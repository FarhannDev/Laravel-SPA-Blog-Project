<?php

namespace App\Http\Livewire\Admin\Stories;

use App\Models\Post;
use Livewire\Component;

class StoriesIndex extends Component
{
  public function render()
  {
    return view('livewire.admin.stories.stories-index', [
      'stories' => Post::orderBy('post_title', 'DESC')->latest()->paginate(10),
    ])
      ->extends('layouts.dashboard.index')
      ->section('content');
  }
}
