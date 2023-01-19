<?php

namespace App\Http\Livewire\Author\Stories;

use App\Models\Post;
use App\Models\PostCategory;
use Livewire\Component;

class StoriesPublish extends Component
{

  public function deletePosts($id)
  {
    $posts = Post::where('user_id', \Auth::user()->id)->findOrFail($id);

    if (\File::exists('storage/posts/' . $posts->post_cover)) {
      \File::delete('storage/posts/' . $posts->post_cover);
    };
    $posts->delete();

    return redirect()
      ->back()
      ->with('success', 'Success Delete Story');
  }


  public function render()
  {
    return view('livewire.author.stories.stories-publish', [
      'posts' => Post::where('user_id', \Auth::user()->id)
        ->with('category')
        ->where('status', 'publish')
        ->orderBy('publish_date', 'DESC')
        ->paginate(20),
      'posts_count' => Post::where('user_id', \Auth::user()->id)->where('status', 'publish')->count(),
      'category' => PostCategory::all(),
    ])
      ->extends('layouts.dashboard.index')
      ->section('content');
  }
}
