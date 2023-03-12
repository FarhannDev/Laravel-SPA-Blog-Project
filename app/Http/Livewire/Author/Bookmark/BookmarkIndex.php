<?php

namespace App\Http\Livewire\Author\Bookmark;

use App\Models\Post;
use Livewire\Component;

class BookmarkIndex extends Component
{
  public function render()
  {
    return view('livewire.author.bookmark.bookmark-index', [
      'posts' => Post::all()
    ])
      ->extends('layouts.dashboard.index')
      ->section('content');
  }
}
