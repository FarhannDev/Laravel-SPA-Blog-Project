<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\PostCategory;
use Livewire\Component;

class CategoriesIndex extends Component
{
  public $formShow = false;

  protected $listeners = [
    'categoryStore' => 'categoryStoreHandler',
    'formClose'     => 'formCloseHandler'
  ];

  public function categoryStoreHandler()
  {
    session()->flash('success', 'Success Added Category');
    $this->formShow = false;
  }
  public function formCloseHandler()
  {
    $this->formShow = false;
  }

  public function deleteCategory($categoryId)
  {
    $category = PostCategory::findOrFail($categoryId);
    $category->delete();

    session()->flash('success', 'Success Deleted Category');
  }

  public function render()
  {
    return view('livewire.admin.categories.categories-index', [
      'categories' => PostCategory::all(),
    ])
      ->extends('layouts.dashboard.index')
      ->section('content');
  }
}
