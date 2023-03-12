<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class UserIndex extends Component
{
  public $search;
  public $email;
  public $role;
  public $paginate = 10;
  protected $queryString = ['search' => ['except' => '']];

  public function deleteUser($id)
  {
    try {
      $user = User::findOrFail($id);
      $roles = $user->roles;

      if (File::exists(public_path('storage/avatar/' . $user->avatar))) {
        File::delete(public_path('storage/avatar/' . $user->avatar));
      }

      foreach ($roles as $key => $role) {
        $user->detachRole($role);
      }

      $user->delete();
      return redirect()->route('admin.user.index')
        ->with('success', 'Success Deleted User');
    } catch (\Exception $e) {
      return $e->getMessage();
    }
  }

  public function render()
  {
    $user = User::when($this->search, function (EloquentBuilder $query) {
      $query->where('name', 'like', '%' . trim($this->search) . '%');
    })->when($this->email, function (EloquentBuilder $query) {
      $query->where('email', 'like', '%' . trim($this->email) . '%');
    })->when($this->role, function (EloquentBuilder $query) {
      $query->whereHas('roles', function (EloquentBuilder $q) {
        $q->where('name', $this->role);
      });
    })->orderBy('name', 'DESC')->latest()->paginate($this->paginate);

    return view('livewire.admin.user.user-index', [
      'users' => $user,
      'roles' => Role::all(),
    ])
      ->extends('layouts.dashboard.index')
      ->section('content');
  }
}
