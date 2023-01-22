<?php

namespace App\Http\Livewire\Admin\Role;

use App\Models\Role;
use Livewire\Component;

class RoleEdit extends Component
{
  public $roleId;
  public $name;
  public $description;

  protected $listeners = ['editRole' => 'editRoleHandler'];
  protected $rules = [
    'name' => 'required|string|min:5|max:20',
  ];

  public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
  }

  public function editRoleHandler($roles)
  {
    $this->roleId = $roles['id'];
    $this->name = $roles['name'];
    $this->description = $roles['description'];
  }

  public function update()
  {
    try {
      $this->validate();

      $role = Role::findOrFail($this->roleId);
      $role->update([
        'name'         => $this->name,
        'display_name' => \Str::ucfirst($this->name),
        'description'  => $this->description ? $this->description : null,
        'updated_at'   => new \DateTime(),
      ]);

      $this->emit('updateRole');
    } catch (\Exception $e) {
      return $e->getMessage();
    }
  }

  public function render()
  {
    return view('livewire.admin.role.role-edit', [
      'page_title' => 'Edit Role',
    ])
      ->extends('layouts.dashboard.index')
      ->section('content');
  }
}
