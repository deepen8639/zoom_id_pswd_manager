<?php

use Illuminate\Database\Seeder;

class ListNameTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\ListName::create([
        'list_name' => '刑法二部',
        'userid' => 'honda',
      ]);
      \App\ListName::create([
        'list_name' => '西洋政治思想史',
        'userid' => 'honda',
      ]);
      \App\ListName::create([
        'list_name' => '表象文化史',
        'userid' => 'honda',
      ]);
      \App\ListName::create([
        'list_name' => '民事訴訟法',
        'userid' => 'honda',
      ]);
      \App\ListName::create([
        'list_name' => '刑法二部',
        'userid' => 'nakano',
      ]);
    }
}
