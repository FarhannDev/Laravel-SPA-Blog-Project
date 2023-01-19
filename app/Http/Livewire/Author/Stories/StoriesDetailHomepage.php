<?php

namespace App\Http\Livewire\Author\Stories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class StoriesDetailHomepage extends Component
{
  public $stories_id;
  public $stories_title;
  public $stories_description;
  public $stories_image;
  public $stories_category;
  public $stories_publish_by;
  public $stories_publish;



  public function mount($username, $story)
  {
    $data = Post::with('user')->whereHas('user', function (Builder $query) use ($username) {
      $query->where('username', $username);
    })->where('post_slug', $story)->first();

    if ($data) {
      $this->stories_id               = $data['id'];
      $this->stories_title            = $data['post_title'];
      $this->stories_description      = $data['post_description'];
      $this->stories_image            = asset('storage/posts/' . $data['post_cover']);
      $this->stories_category         = $data->category['category_name'];
      $this->stories_publish_by       = $data['publish_by'];
      $this->stories_publish          = date('M d Y', strtotime($data['publish_date']));
    }
  }

  public function render()
  {
    return view('livewire.author.stories.stories-detail-homepage')
      ->extends('layouts.dashboard.index')
      ->section('content');
  }
}
