<?php

namespace App\Http\Livewire\Author\Profile;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class ProfilePubllic extends Component
{
  public $data = null;

  public function mount($username)
  {
    $this->data = Post::with('user')
      ->whereHas('user', function (Builder $query) use ($username) {
        $query->where('username', $username);
      })->where('status', 'publish')->orderBy('post_title', 'DESC')->get();
  }
  public function render()
  {
    return view('livewire.author.profile.profile-publlic')
      ->extends('layouts.dashboard.index')
      ->section('content');
  }
}
