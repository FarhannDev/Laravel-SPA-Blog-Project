<?php

namespace App\Http\Livewire\Author\Profile;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileEdit extends Component
{
  use WithFileUploads;
  public $userId;
  public $uuid;
  public $name;
  public $username;
  public $email;
  public $avatar;
  public $bio;

  public $avatar_origin;

  protected $rules = [
    'name'        => 'required|string|min:3|max:100',
    'email'       => 'required|string|email',
    'username'    => 'required|string|max:12',
    'avatar'      => 'image|mimes:jpeg,jpg,png|max:2048'
  ];

  public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
  }

  public function mount()
  {
    $data = User::where('id', \Auth::user()->id)->first();
    if (!is_null($data)) {
      $this->userId         = $data['id'];
      $this->uuid           = $data['uuid'];
      $this->name           = $data['name'];
      $this->username       = $data['username'];
      $this->email          = $data['email'];
      $this->avatar_origin  = asset('storage/avatar/' . $data['avatar']);
    }
  }

  public function updateProfile()
  {

    $this->validate();

    $user = User::where('id', $this->userId)->first();
    $user_avatar = null;

    if ($this->avatar) {
      \File::exists('storage/avatar/' . $user['avatar']);
      \File::delete('storage/avatar/' . $user['avatar']);

      $extension = \Str::lower($this->avatar->getClientOriginalExtension());
      $user_avatar = 'author' . '-' . uniqid() . '.' . $extension;
      $this->avatar = $this->avatar->storeAs('public/avatar', $user_avatar, 'local');
    } else {
      $user_avatar = $user['avatar'];
    }

    $user->update([
      'uuid' => $this->uuid,
      'name' => $this->name,
      'username' => $this->username,
      'email' => $this->email,
      'avatar' => $user_avatar,
      'updated_at' => new \DateTime()
    ]);

    return redirect()
      ->route('author.profile.index')
      ->with('success', ' Profile updated successfully');
  }


  public function render()
  {
    return view('livewire.author.profile.profile-edit')
      ->extends('layouts.dashboard.index')
      ->section('content');
  }
}
