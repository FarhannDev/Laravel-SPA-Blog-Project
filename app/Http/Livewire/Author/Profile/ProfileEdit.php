<?php

namespace App\Http\Livewire\Author\Profile;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileEdit extends Component
{
  use WithFileUploads;

  public $userId;
  public $name;
  public $usname;
  public $email;
  public $avatar;
  public $avatarOrigin;
  public $bio;

  public $avatarName;

  protected $rules = [
    'name' => 'required',
    'email' => 'required|email',
    'usname' => 'required',
    'avatar' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
  ];

  public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
  }


  public function mount($username)
  {
    $data = User::where('username', $username)->first();

    if ($data) {
      $this->userId = $data->id;
      $this->name = $data->name;
      $this->email = $data->email;
      $this->usname = $data->username;
      $this->avatarOrigin = $data->avatar;
    }
  }


  public function ProfileUpdate()
  {
    $this->validate();

    $user = User::findOrFail($this->userId);

    if ($this->avatar) {
      \File::exists(public_path('avatar', $user->avatar));
      \File::delete(public_path('avatar', $user->avatar));

      $avatarExtension = '.png';
      $newAvatar = 'author-' . uniqid() . $avatarExtension;
      $this->avatar->storeAs('storage/avatar', $newAvatar);
      $this->avatarName = $newAvatar;
    }

    $user->update([
      'name'     => $this->name,
      'username' => $this->usname,
      'email'    => $this->email,
      'avatar'   => $this->avatar ? $this->avatarName : $this->avatarOrigin,
      'updated_at' => now()
    ]);

    return redirect()->route('author.profile.index', $user->username)
      ->with('success', 'Profile update was successful');
  }

  public function render()
  {
    return view('livewire.author.profile.profile-edit')
      ->extends('layouts.dashboard.index')
      ->section('content');
  }
}
