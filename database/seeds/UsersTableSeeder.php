<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
          'userid' => 'honda',
          'password' => Hash::make('masahiro')
        ]);
        \App\User::create([
          'userid' => 'nakano',
          'password' => Hash::make('takuo')
        ]);
    }
}
