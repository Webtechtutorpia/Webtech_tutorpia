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
        DB::table('Actifity')->insert([
            'created_at' => new DateTime(),
            'Rolle' => 'Tutor',
            'Name' => 'Max',
            'Activityart' => 1,
        ]);

        DB::table('Actifity')->insert([
            'created_at' => new DateTime(),
            'Rolle' => 'Professor',
            'Name' => 'Anton',
            'Activityart' => 2,
        ]);
    }
}
