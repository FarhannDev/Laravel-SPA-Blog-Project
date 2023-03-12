<?php

namespace App\Http\Livewire\Author\Stories;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class StoriesPublish extends Component
{

  public function deletePosts($id)
  {
    $posts = Post::where('user_id', \Auth::user()->id)->findOrFail($id);

    if (\File::exists('storage/story/' . $posts->post_cover)) {
      \File::delete('storage/story/' . $posts->post_cover);
    };
    $posts->delete();

    return redirect()
      ->back()
      ->with('success', 'Success Delete Story');
  }


  public function render()
  {
    $data = Cache::remember('posts.publish', now()->addMinutes(120), function () {
      return Post::where('user_id', \Auth::user()->id)
        ->with('category')
        ->where('status', 'publish')
        ->orderBy('publish_date', 'DESC')
        ->paginate(20);
    });

    return view('livewire.author.stories.stories-publish', [
      'posts' => $data,
      'posts_count' => Post::where('user_id', \Auth::user()->id)->where('status', 'publish')->count(),
      'category' => PostCategory::all(),
    ])
      ->extends('layouts.dashboard.index')
      ->section('content');
  }
}
