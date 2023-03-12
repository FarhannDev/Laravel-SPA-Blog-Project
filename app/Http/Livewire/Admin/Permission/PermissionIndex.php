<?php

namespace App\Http\Livewire\Admin\Permission;

use App\Models\Permission;
use Livewire\Component;

class PermissionIndex extends Component
{
  public function render()
  {
    return view('livewire.admin.permission.permission-index', [
      'permissions' => Permission::orderBy('name', 'ASC')->get(),
    ])
      ->extends('layouts.dashboard.index')
      ->section('content');
  }
}
