<?php

namespace App\Http\Livewire\Admin\Role;

use App\Models\Role;
use Livewire\Component;

class RoleAdd extends Component
{
  public $name;
  public $description;

  protected $rules = [
    'name' => 'required|string|min:5|max:20',
  ];

  public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
  }

  public function addRole()
  {
    try {
      $this->validate();

      Role::create([
        'name'         => $this->name,
        'display_name' => \Str::ucfirst($this->name),
        'description'  => $this->description ? $this->description : null,
        'created_at'   => new \DateTime(),
        'updated_at'   => new \DateTime(),
      ]);

      $this->emit('addRole');
    } catch (\Exception $e) {
      return $e->getMessage();
    }
  }

  public function render()
  {
    return view('livewire.admin.role.role-add');
  }
}
