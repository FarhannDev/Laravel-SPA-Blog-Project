<?php

namespace App\Http\Livewire\Stories;

use Livewire\Component;
use App\Models\Post;
use App\Models\PostCategory;

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
      ->with('success', 'Berhasil Menghapus Postingan');
  }

  public function render()
  {

    return view('livewire.stories.stories-draft', [
      'posts' => Post::where('user_id', \Auth::user()->id)
        ->with('category')
        ->where('status', 'unpublish')
        ->orderBy('unpublish_date', 'DESC')
        ->paginate(20),
      'posts_count' => Post::where('user_id', \Auth::user()->id)
        ->where('status', 'unpublish')
        ->count(),
      'category' => PostCategory::all(),
    ])
      ->extends('layouts.dashboard.index')
      ->section('content');
  }
}
