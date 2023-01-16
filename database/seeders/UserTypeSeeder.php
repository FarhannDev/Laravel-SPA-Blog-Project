<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
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
        'type_name' => 'admin',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'type_name' =>  'author',
        'created_at' => now(),
        'updated_at' => now(),
      ]
    ];

    foreach ($data as $key => $value) {
      UserType::create($value);
    }
  }
}
