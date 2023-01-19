<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Auth::routes();
// Routes:HOMEPAGE
Route::get('/', \App\Http\Livewire\Homepage\HomePageIndex::class)->name('homepage.index');
Route::get('/stories/{username}/{story}', \App\Http\Livewire\Author\Stories\StoriesDetailHomepage::class)->name('story.detail');
Route::get('/search-story', \App\Http\Livewire\Author\Stories\StoriesSearch::class)->name('story.search');
Route::get('/{username}', App\Http\Livewire\Author\Profile\ProfilePubllic::class)->name('author.profile.public');

Route::middleware(['auth'])->group(function () {
  // Author:routes
  Route::middleware(['user-access:author'])->prefix('author')->group(function () {
    Route::get('/dashboard', App\Http\Livewire\Author\Dashboard\DashboardIndex::class)->name('author.dashboard.index');
    // Add story route
    Route::get('/stories', App\Http\Livewire\Author\Stories\StoriesIndex::class)->name('author.stories.index');
    Route::get('/stories/add', App\Http\Livewire\Author\Stories\StoriesAdd::class)->name('author.stories.add');
    Route::get('/stories/publish', App\Http\Livewire\Author\Stories\StoriesPublish::class)->name('author.stories.publish');
    Route::get('/stories/drafts', App\Http\Livewire\Author\Stories\StoriesDraft::class)->name('author.stories.drafts');
    Route::get('/stories/{slug}', App\Http\Livewire\Author\Stories\StoriesShow::class)->name('author.stories.show');
    Route::get('/stories/{id}/edit', App\Http\Livewire\Author\Stories\StoriesEdit::class)->name('author.stories.edit');

    Route::get('/bookmark', App\Http\Livewire\Author\Bookmark\BookmarkIndex::class)->name('author.bookmark.index');
    // Add author profile route
    Route::get('/profile/{username}', App\Http\Livewire\Author\Profile\ProfileIndex::class)->name('author.profile.index');
    Route::get('/profile/{username}/about', App\Http\Livewire\Author\Profile\ProfileAbout::class)->name('author.profile.about');
    Route::get('/profile/{username}/edit', App\Http\Livewire\Author\Profile\ProfileEdit::class)->name('author.profile.edit');
  });
});
