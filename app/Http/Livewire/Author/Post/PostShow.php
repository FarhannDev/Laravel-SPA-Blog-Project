<?php

namespace App\Http\Livewire\Author\Post;

use App\Models\Post;
use Livewire\Component;

class PostShow extends Component
{
  public $title;
  public $description;
  public $cover;
  public $publish_by;
  public $created;

  public function mount(Post $post)
  {
    $data = Post::where('post_slug', $post['post_slug'])->first();

    if (!is_null($data)) {
      $this->title  = $data['post_title'];
      $this->description = $data['post_description'];
      $this->cover       = $data['post_cover'];
      $this->publish_by  = $data['publish_by'];
      $this->created     = date('d/m/Y H:i:s', strtotime($data['created_at']));
    }
  }

  public function render()
  {
    return view('livewire.author.post.post-show')

      ->extends('layouts.dashboard.index')
      ->section('content');
  }
}
