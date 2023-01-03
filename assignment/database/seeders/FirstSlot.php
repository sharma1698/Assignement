<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class FirstSlot extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slots')->insert([
            "id"=> 1,
            "field1" => 0,
            "field2" => 0,
            "field3" => 0
        ]);
    }
}
