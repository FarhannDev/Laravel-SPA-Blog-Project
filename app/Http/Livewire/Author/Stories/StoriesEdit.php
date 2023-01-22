<?php

namespace App\Http\Livewire\Author\Stories;

use App\Models\Post;
use Livewire\Component;
use App\Models\PostCategory;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class StoriesEdit extends Component
{
  use WithFileUploads;
  public $post_slug;
  public $post_title;
  public $post_categorie_id;
  public $post_description;
  public $post_cover;
  public $status;

  public $post_cover_original;
  public $userId;

  public function mount($id)
  {

    $data = Post::where('user_id', \Auth::user()->id)
      ->where('id', $id)
      ->first();

    if ($data) {
      $this->post_slug         = $data->post_slug;
      $this->post_title        = $data->post_title;
      $this->post_categorie_id = $data->post_categorie_id;
      $this->post_description  = $data->post_description;
      $this->status            = $data->status;
      $this->post_cover_original = asset('storage/story/' . $data->post_cover);
      $this->userId             = $data->id;
    }
  }


  protected $rules = [
    'post_title'       => 'required|string|min:6|max:255',
    'post_categorie_id' => 'required',
    'post_description' => 'required|string',
    'post_cover'       => 'nullable|mimes:jpeg,jpg,png|max:2048'
  ];

  protected $messages = [
    'post_title.required'       => 'Judul postingan tidak boleh kosong.',
    'post_title.min'            => 'Judul postingan minimal 6 karakter.',
    'post_title.max'            => 'Judul postingan sudah maksimal.',
    'post_categorie_id.required' => 'Category tidak boleh kosong.',
    'post_description.required' => 'Deskripsi tidak boleh kosong.'
  ];

  public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
  }

  public function updatePosts()
  {
    $this->validate();

    if ($this->post_slug) {
      $posts = Post::where('post_slug', $this->post_slug)->first();
      $cover = null;

      if ($this->post_cover) {
        \File::exists('storage/story/' . $posts->post_cover);
        \File::delete('storage/story/' . $posts->post_cover);

        $extension = '.png';
        $filename = 'story-' . uniqid()  . $extension;

        // store image to storage
        $this->post_cover->storeAs('public/story', $filename);
        $cover = $filename;
      } else {
        $cover = $posts['post_cover'];
      }

      $posts->update([
        'post_title'        => $this->post_title,
        'post_slug'         => \Str::slug($this->post_title, '-') . '-' . uniqid(),
        'post_description'  => $this->post_description,
        'post_cover'        => $cover,
        'status'            => $this->status,
        'publish_date'      => ($this->status !== 'unpublish' ? now() : null),
        'unpublish_date'    => ($this->status === 'unpublish' ? now() : null),
        'publish_by'        => \Auth::user() ? \Auth::user()->name : null,
        'user_id'           => \Auth::user() ? \Auth::user()->id : null,
        'post_categorie_id' => $this->post_categorie_id,
        'updated_at'        => new \DateTime(),
      ]);

      return redirect()
        ->route('author.stories.index')
        ->with('success', 'Success Updated Story');
    }
  }


  public function render()
  {
    return view('livewire.author.stories.stories-edit', [
      'category' => PostCategory::all(),
    ])
      ->extends('layouts.dashboard.index')
      ->section('content');
  }
}
