<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class DashboardIndex extends Component
{
  public function render()
  {
    return view('livewire.admin.dashboard-index')
      ->extends('layouts.dashboard.index')
      ->section('content');
  }
}
