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
Route::get('/beranda', \App\Http\Livewire\Homepage\HomePageIndex::class)->name('homepage.index');
Route::get('/stories/{username}/{story}', \App\Http\Livewire\Author\Stories\StoriesDetailHomepage::class)->name('story.detail');
Route::get('/search-story', \App\Http\Livewire\Author\Stories\StoriesSearch::class)->name('story.search');
Route::get('/author/{username}', App\Http\Livewire\Author\Profile\ProfilePubllic::class)->name('author.profile.public');
Route::get('/author/{username}/all-story', App\Http\Livewire\Author\Profile\ProfilePublicStory::class)->name('author.public.story');

Route::middleware(['auth'])->group(function () {
  Route::prefix('me')->group(function () {
    Route::get('/stories', App\Http\Livewire\Author\Stories\StoriesIndex::class)->name('author.stories.index');
    Route::get('/stories/new-story', App\Http\Livewire\Author\Stories\StoriesAdd::class)->name('author.stories.add');
    Route::get('/stories/{id}/edit', App\Http\Livewire\Author\Stories\StoriesEdit::class)->name('author.stories.edit');
    Route::get('/stories/publish', App\Http\Livewire\Author\Stories\StoriesPublish::class)->name('author.stories.publish');
    Route::get('/stories/drafts', App\Http\Livewire\Author\Stories\StoriesDraft::class)->name('author.stories.drafts');
    Route::get('/stories/{slug}', App\Http\Livewire\Author\Stories\StoriesShow::class)->name('author.stories.show');
  });
  Route::get('/profile', App\Http\Livewire\Profile\ProfileIndex::class)->name('profile.index');
  Route::get('/profile/all-story', App\Http\Livewire\Profile\ProfileStoryList::class)->name('profile.allstory');
  Route::get('/setting', App\Http\Livewire\Setting\SettingIndex::class)->name('setting.index');
});
