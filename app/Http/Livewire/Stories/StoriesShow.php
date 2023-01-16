<?php

namespace App\Http\Livewire\Stories;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class StoriesShow extends Component
{
  public $stories_id;
  public $stories_title;
  public $stories_content;
  public $stories_image;
  public $stories_publish;
  public $stories_publish_date;

  public function mount($username, $slug)
  {
    $data = Post::with('user')
      ->whereHas('user', function (Builder $query) use ($username) {
        $query->where('username', $username);
      })
      ->where('post_slug', $slug)->first();

    if ($data) {
      $this->stories_id           = $data['id'];
      $this->stories_title        = $data['post_title'];
      $this->stories_content      = $data['post_description'];
      $this->stories_image        = $data['post_cover'];
      $this->stories_publish      = $data['publish_by'];
      $this->stories_publish_date = date('M d Y', strtotime($data['publish_date']));
    } else {
      abort(404);
    }
  }
  public function render()
  {
    return view('livewire.stories.stories-show', [
      'categories' => PostCategory::all()
    ])
      ->extends('layouts.dashboard.index')
      ->section('content');
  }
}
