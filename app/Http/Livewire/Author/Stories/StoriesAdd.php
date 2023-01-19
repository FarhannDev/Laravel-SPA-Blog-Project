<?php

namespace App\Http\Livewire\Author\Stories;

use Livewire\Component;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class StoriesAdd extends Component
{
  use WithFileUploads;

  public $post_categorie_id;
  public $post_title;
  public $post_description;
  public $post_cover;
  public $status;

  protected $rules = [
    'post_title' => 'required|string|min:6|max:255',
    'post_categorie_id' => 'required',
    'post_description' => 'required|string',
    'status' => 'required',
    'post_cover'      => 'image|mimes:jpeg,jpg,png|max:2048'
  ];

  protected $messages = [
    'post_title.required'         => 'Judul postingan tidak boleh kosong.',
    'post_title.min'              => 'Judul postingan minimal 6 karakter.',
    'post_title.max'              => 'Judul postingan sudah maksimal.',
    'post_categorie_id.required'  => 'Kategory tidak boleh kosong.',
    'post_description.required'   => 'Deskripsi tidak boleh kosong.',
    'status.required'             => 'Status postingan tidak boleh kosong.',
    'post_cover.image'            => 'Upload File bertipe Gambar.',
    'post_cover.mimes'            => 'File yang di Upload hanya bisa dengan extension JPG/PNG.',
    'post_cover'                  => 'File yang diupload tidak boleh lebih dari 2MB.'
  ];

  public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
  }

  public function savePosts()
  {
    $this->validate();

    $filename = null;
    if ($this->post_cover) {
      $extension = '.png';
      $filename = \Str::slug($this->post_title, '-') . '-' . uniqid()  . $extension;

      // store image to storage
      $this->post_cover->storeAs('public/posts', $filename);
    }

    Post::create([
      'post_title'        => $this->post_title,
      'post_slug'         => \Str::slug($this->post_title, '-') . '-' . uniqid(),
      'post_description'  => $this->post_description,
      'post_cover'        => ($this->post_cover ? $filename : null),
      'status'            => $this->status,
      'publish_date'      => ($this->status !== 'unpublish' ? now() : null),
      'unpublish_date'    => ($this->status === 'unpublish' ? now() : null),
      'publish_by'        => \Auth::user() ? \Auth::user()->name : null,
      'user_id'           => \Auth::user() ? \Auth::user()->id : null,
      'post_categorie_id' => $this->post_categorie_id,
      'created_at'        => new \DateTime(),
      'updated_at'        => new \DateTime(),
    ]);

    return redirect()
      ->route('author.stories.index')
      ->with('success', 'Success Added Story');
  }

  public function render()
  {
    return view('livewire.author.stories.stories-add', [
      'category' => PostCategory::all(),
    ])
      ->extends('layouts.dashboard.index')
      ->section('content');
  }
}
