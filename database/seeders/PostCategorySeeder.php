<?php

namespace Database\Seeders;

use App\Models\PostCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostCategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $data = [
      [
        'category_name' => 'Olahraga',
        'category_slug' => 'olahraga',
        'created_at'    => now(),
        'updated_at'    => now(),
      ],
      [
        'category_name' => 'Hiburan',
        'category_slug' => 'hiburan',
        'created_at'    => now(),
        'updated_at'    => now(),
      ],
      [
        'category_name' => 'Petualangan',
        'category_slug' => 'petualangan',
        'created_at'    => now(),
        'updated_at'    => now(),
      ],
    ];

    foreach ($data as $key => $value) {
      PostCategory::create($value);
    }
  }
}
