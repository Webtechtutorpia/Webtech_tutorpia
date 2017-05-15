<?php

use Illuminate\Database\Seeder;

class Activityseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Activity')->insert([
            'created_at' => new DateTime(),

        ]);

        DB::table('Activity')->insert([
            'created_at' => new DateTime(),

        ]);
    }
}
