<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;

class UserAdd extends Component
{
  public $name;
  public $email;
  public $password;
  public $password_confirmation;
  public $role;
  public $username;

  protected $rules = [
    'name'  => 'required|string|min:3|max:100',
    'email' => 'required|string|email|unique:users,email',
    'username' => 'required|string|unique:users,username',
    'password' => 'required|string|min:6|max:120|confirmed'
  ];

  public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
  }


  public function saveUser()
  {
    try {
      $this->validate();

      $user = User::create([
        'name'       => $this->name,
        'email'      => $this->email,
        'username'   => \Str::slug($this->username, '_'),
        'password'   => \Hash::make($this->password),
        'uuid'       => 'NG-' . \Str::random(16),
        'created_at' => now(),
        'updated_at' => now(),
      ]);

      $role = Role::find($this->role);
      $user->attachRole($role);

      return redirect()->back()->with('success', 'Success Added User');
    } catch (\Exception $e) {
      return $e->getMessage();
    }
  }

  public function render()
  {
    return view('livewire.admin.user.user-add', [
      'roles' => Role::all(),
    ])
      ->extends('layouts.dashboard.index')
      ->section('content');
  }
}
