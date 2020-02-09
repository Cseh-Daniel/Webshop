<?php

use Illuminate\Database\Seeder;

class termekekTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $termek= new \App\termekek([
"csop"=>"p",
"nev"=>"valami patron",
"db"=>"20",
"ar"=>"1234"
      ]);
      $termek->save();
    }
}
