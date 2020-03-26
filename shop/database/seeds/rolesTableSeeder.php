<?php

use Illuminate\Database\Seeder;

class rolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role=new \App\roles([  "name"=>"admin"    ]);
        $role->save();
        $role=new \App\roles([  "name"=>"user"    ]);
        $role->save();
    }
}
