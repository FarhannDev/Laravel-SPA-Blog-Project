<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" m
iddleware group. Now create something great!
|
*/

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/

Auth::routes();

Route::get('/', App\Http\Livewire\Homepage\HomePageIndex::class)->name('homepage.index');
Route::get('/{username}', App\Http\Livewire\Profile\ProfileIndex::class)->name('profile.index');
Route::get('/{username}/about', App\Http\Livewire\Profile\ProfileAbout::class)->name('profile.about');
Route::get('/{username}/{slug}', App\Http\Livewire\Stories\StoriesShow::class)->name('stories.show');

// Route:story
Route::middleware(['auth', 'user-access:author'])->prefix('me')->group(function () {
  Route::get('/stories/add', App\Http\Livewire\Stories\StoriesAdd::class)->name('stories.add');
  Route::get('/stories/{id}/edit', App\Http\Livewire\Stories\StoriesEdit::class)->name('stories.edit');

  Route::get('/stories/my', App\Http\Livewire\Stories\StoriesIndex::class)->name('stories.index');
  Route::get('/stories/publish', App\Http\Livewire\Stories\StoriesPublish::class)->name('stories.publish');
  Route::get('/stories/drafts', App\Http\Livewire\Stories\StoriesDraft::class)->name('stories.drafts');
});

Route::middleware(['auth', 'user-access:author'])->prefix('settings')->group(function () {
  // Route::get('/profile', App\Http\Livewire\Setting\SettingIndex::class)->name('settings.index');
});
