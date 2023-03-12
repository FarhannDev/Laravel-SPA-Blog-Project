<?php

namespace App\Http\Livewire\Author\Stories;

use App\Models\Post;
use App\Models\PostCategory;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class StoriesShow extends Component
{
  public $stories_id;
  public $stories_title;
  public $stories_slug;
  public $stories_content;
  public $stories_image;
  public $stories_publish;
  public $stories_publish_date;

  public $posts = null;

  public function mount($slug)
  {
    $data = Post::with('user')
      // ->whereHas('user', function (Builder $query) use ($username) {
      //   $query->where('username', $username);
      // })
      ->where('post_slug', $slug)->first();

    if ($data) {
      $this->stories_id           = $data['id'];
      $this->stories_title        = $data['post_title'];
      $this->stories_slug         = $data['post_slug'];
      $this->stories_content      = $data['post_description'];
      $this->stories_image        = $data['post_cover'];
      $this->stories_publish      = $data['publish_by'];
      $this->stories_publish_date = date('M d Y', strtotime($data['publish_date']));
    } else {
      abort(404);
    }

    $this->posts = Post::where('post_slug', $slug)->first();
  }


  public function render()
  {
    return view('livewire.author.stories.stories-show', [
      'categories' => PostCategory::all()
    ])
      ->extends('layouts.dashboard.index')
      ->section('content');
  }
}
