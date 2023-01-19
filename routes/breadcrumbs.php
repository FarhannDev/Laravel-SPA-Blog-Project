<?php // routes/breadcrumbs.php

use App\Models\Post;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Dashboard
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
  $trail->push('Home', route('homepage.index'));
});
Breadcrumbs::for('search-story', function (BreadcrumbTrail $trail) {
  $trail->parent('home');
  $trail->push('Search Story', route('story.search'));
});

// Story
Breadcrumbs::for('stories', function (BreadcrumbTrail $trail) {
  $trail->parent('home');
  $trail->push('Stories', route('author.stories.index'));
});
// Story > New Story
Breadcrumbs::for('new-story', function (BreadcrumbTrail $trail) {
  $trail->parent('stories');
  $trail->push('New Story', route('author.stories.add'));
});
// Story > show
Breadcrumbs::for('story-show', function (BreadcrumbTrail $trail, Post $slug) {
  $trail->parent('stories');
  $trail->push('' . \Str::limit($slug->post_title, 50, '...'), route('author.stories.show',  $slug));
});
Breadcrumbs::for('story-publish', function (BreadcrumbTrail $trail) {
  $trail->parent('stories');
  $trail->push('Publish', route('author.stories.publish'));
});
Breadcrumbs::for('story-draft', function (BreadcrumbTrail $trail) {
  $trail->parent('stories');
  $trail->push('Draft', route('author.stories.publish'));
});
Breadcrumbs::for('story-edit', function (BreadcrumbTrail $trail, $userId) {
  $trail->parent('stories');
  $trail->push('Edit Story', route('author.stories.edit', $userId));
});
Breadcrumbs::for('bookmark', function (BreadcrumbTrail $trail) {
  $trail->parent('home');
  $trail->push('Bookmark', route('author.bookmark.index'));
});
Breadcrumbs::for('profile', function (BreadcrumbTrail $trail, $profile) {
  $trail->parent('home');
  $trail->push('Profile', route('author.profile.index', $profile));
});
Breadcrumbs::for('profile-about', function (BreadcrumbTrail $trail, $username) {
  $trail->parent('profile', $username);
  $trail->push('About', route('author.profile.about', $username));
});
Breadcrumbs::for('profile-edit', function (BreadcrumbTrail $trail, $usname) {
  $trail->parent('profile', $usname);
  $trail->push('Edit', route('author.profile.edit', $usname));
});
