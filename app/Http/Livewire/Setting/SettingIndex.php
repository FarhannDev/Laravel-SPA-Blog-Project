<?php

namespace App\Http\Livewire\Setting;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class SettingIndex extends Component
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

  public $password_lama;
  public $password_baru;
  public $password_baru_konfirm;

  protected $rules = [
    'name'        => 'required|string|min:3|max:100',
    'email'       => 'required|string|email',
    'username'    => 'required|string|max:14',
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
      ->route('settings.index')
      ->with('success', ' Profile updated successfully');
  }
  public function updatePassword()
  {
    $this->validate([
      'password_lama' => 'required|string',
      'password_baru' => 'min:6|required',
      'password_baru_konfirm' => 'same:password_baru|min:6'
    ]);

    $user = User::where('id', $this->userId)->first();

    if (\Hash::check($this->password_lama, $user['password'])) {
      $this->password_baru = \Hash::make($this->password_baru);

      User::where('id', \Auth::user()->id)->update([
        'password' => $this->password_baru,
        'updated_at' => new \DateTime(),
      ]);

      return redirect()
        ->route('settings.index')
        ->with('success', 'Password berhasil diubah.');
    }

    session()->flash('password_salah', 'Password tidak sesuai!!');
  }


  public function render()
  {
    return view('livewire.setting.setting-index')
      ->extends('layouts.dashboard.index')
      ->section('content');
  }
}
