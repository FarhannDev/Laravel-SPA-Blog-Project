<?php

namespace App\Http\Livewire\Admin\Role;

use App\Models\Role;
use Livewire\Component;

class RoleIndex extends Component
{
  public $formVisible = false;
  public $formAdd = false;
  public $formUpdate = false;

  protected $listeners = [
    'addRole' => 'addRoleHandler',
    'updateRole' => 'updateRoleHandler',
    'closeButton' => 'closeButtonHandler',
  ];

  public function addRoleHandler()
  {
    session()->flash('success', 'Success Added Role');
    $this->formVisible = false;
  }
  public function closeButtonHandler()
  {
    $this->formVisible = false;
    // session()->flash('success', 'Success Added Role');
  }
  public function updateRoleHandler()
  {
    session()->flash('success', 'Success Updated Role');
    $this->formVisible = false;
    $this->formUpdate = false;
  }

  public function deletedRole($id)
  {
    try {
      $role  = Role::findOrFail($id);
      $role->delete();

      session()->flash('success', 'Success Deleted Role');
    } catch (\Exception $e) {
      return $e->getMessage();
    }
  }

  public function editRole($roleId)
  {
    try {
      $roles = Role::findOrFail($roleId);
      $this->formUpdate = true;
      $this->formVisible = true;

      $this->emit('editRole', $roles);
    } catch (\Exception $e) {
      return $e->getMessage();
    }
  }

  public function render()
  {
    return view('livewire.admin.role.role-index', [
      'roles' => Role::all(),
    ])
      ->extends('layouts.dashboard.index')
      ->section('content');
  }
}
