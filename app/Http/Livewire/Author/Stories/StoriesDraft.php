<?php

namespace App\Http\Livewire\Author\Stories;

use App\Models\Post;
use Livewire\Component;
use App\Models\PostCategory;
use Illuminate\Support\Facades\Cache;

class StoriesDraft extends Component
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
    $data = Cache::remember('posts.draft', now()->addMinutes(120), function () {
      return Post::where('user_id', \Auth::user()->id)
        ->with('category')
        ->where('status', 'unpublish')
        ->orderBy('unpublish_date', 'DESC')
        ->paginate(20);
    });

    return view('livewire.author.stories.stories-draft', [
      'posts' => $data,
      'posts_count' => Post::where('user_id', \Auth::user()->id)
        ->where('status', 'unpublish')
        ->count(),
      'category' => PostCategory::all(),
    ])

      ->extends('layouts.dashboard.index')
      ->section('content');
  }
}
