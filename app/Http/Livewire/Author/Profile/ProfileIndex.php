<?php

namespace App\Http\Livewire\Author\Profile;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class ProfileIndex extends Component
{
  public $data = null;
  public $user = null;

  public function mount($username)
  {
    $this->data = Post::with('user')
      ->whereHas('user', function (Builder $query) use ($username) {
        $query->where('username', $username);
      })->where('status', 'publish')->orderBy('post_title', 'DESC')->get();

    $this->user = User::where('username', $username)->first();
  }

  public function render()
  {
    return view('livewire.author.profile.profile-index')
      ->extends('layouts.dashboard.index')
      ->section('content');
  }
}
