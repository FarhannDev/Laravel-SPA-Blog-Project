<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Livewire\Component;

class ProfileAbout extends Component
{
  public $userId;
  public $username;
  public $name;
  public $bio;
  public $avatar;
  public $user = null;

  public function mount($username)
  {
    $data = User::where('username', $username)->first();

    if ($data) {
      $this->userId = $data['uuid'];
      $this->username = $data['username'];
      $this->name = $data['name'];
      $this->bio = $data['bio'];
      $this->avatar = $data['avatar'];
    }

    $this->user = User::where('username', $username)->first();
  }


  public function render()
  {
    return view('livewire.profile.profile-about')
      ->extends('layouts.dashboard.index')
      ->section('content');
  }
}
