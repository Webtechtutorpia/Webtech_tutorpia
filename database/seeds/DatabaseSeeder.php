<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

       $this->call(UserSeeder::class);
        $this->call(Kursseeder::class);
        $this->call(AufgabeSeeder::class);
        $this->call(Abgabeseeder::class);
        $this->call(BelegungSeeder::class);


    }
}
