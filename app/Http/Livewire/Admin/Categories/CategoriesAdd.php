<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\PostCategory;
use Livewire\Component;

class CategoriesAdd extends Component
{
  public $name;

  protected $rules = ['name' => 'required|string'];
  public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
  }

  public function saveCategory()
  {
    $this->validate();

    PostCategory::create([
      'category_name' => $this->name,
      'category_slug' => \Str::slug($this->name, '-'),
      'created_at'    => new \DateTime(),
      'updated_at'    => new \DateTime(),
    ]);

    $this->emit('categoryStore');
  }

  public function render()
  {
    return view('livewire.admin.categories.categories-add');
  }
}
