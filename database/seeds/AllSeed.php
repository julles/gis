<?php

use Illuminate\Database\Seeder;

class AllSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::unprepared(file_get_contents(public_path('gis.sql')));
    }
}
