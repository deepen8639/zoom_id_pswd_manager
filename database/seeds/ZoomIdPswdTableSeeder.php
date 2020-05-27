<?php

use Illuminate\Database\Seeder;

class ZoomIdPswdTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\ZoomIdPswd::create([
        'list_name' => '刑法二部',
        'userid' => 'honda',
        'zoom_pswd' => 'tmucrim2',
        'zoom_id' => '96515623354',
      ]);
      \App\ZoomIdPswd::create([
        'list_name' => '西洋政治思想史',
        'userid' => 'honda',
        'zoom_pswd' => 'seiyouseiji2',
        'zoom_id' => '555-555-555',
      ]);
      \App\ZoomIdPswd::create([
        'list_name' => '表象文化史',
        'userid' => 'honda',
        'zoom_pswd' => 'hyoushoubunnkashi',
        'zoom_id' => '222-222-666',
      ]);
      \App\ZoomIdPswd::create([
        'list_name' => '民事訴訟法',
        'userid' => 'honda',
        'zoom_pswd' => 'minjisoshouhou',
        'zoom_id' => '444-555-444',
      ]);
      \App\ZoomIdPswd::create([
        'list_name' => '刑法二部',
        'userid' => 'nakano',
        'zoom_pswd' => 'keihounibu',
        'zoom_id' => '96515623354',
      ]);
      \App\ZoomIdPswd::create([
        'list_name' => '刑法二部',
        'userid' => 'honda',
        'zoom_pswd' => 'keihounibu',
        'zoom_id' => '96515623354',
      ]);
      \App\ZoomIdPswd::create([
        'list_name' => '刑法二部',
        'userid' => 'honda',
        'zoom_pswd' => 'tmucrim2',
        'zoom_id' => '96515623354',
      ]);
    }
}
