<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use App\Models\Role;
use Exception;
use Livewire\Component;

class UserEdit extends Component
{
  public $userId;
  public $name;
  public $email;
  public $password;
  public $password_confirmation;
  public $roleUser;
  public $username;

  protected $rules = [
    'name'  => 'required|string|min:3|max:100',
    'email' => 'required|string|email',
    'username' => 'required|string',
  ];

  public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
  }

  public function editUser()
  {
    try {
      $this->validate();

      $user = User::where('uuid', $this->userId)->first();
      $user->update([
        'name'       => $this->name,
        'email'      => $this->email,
        'username'   => \Str::slug($this->username, '_'),
        'updated_at' => now(),
      ]);

      $roles = $user->roles;

      foreach ($roles as $role) {
        $user->detachRole($role);
      }
      $role = Role::find($this->roleUser);
      $user->attachRole($role);

      return redirect()->back()->with('success', 'Success Added User');
    } catch (\Exception $e) {
      return $e->getMessage();
    }
  }

  public function mount($id)
  {
    $user = User::where('uuid', $id)->first();
    if (!is_null($user)) {
      $this->userId   = $user->uuid;
      $this->name     = $user->name;
      $this->username = $user->username;
      $this->email    = $user->email;
      $this->roleUser = $user->roles[0]->id;
    }
  }

  public function render()
  {
    return view('livewire.admin.user.user-edit', [
      'roles' => Role::all(),
    ])
      ->extends('layouts.dashboard.index')
      ->section('content');
  }
}
