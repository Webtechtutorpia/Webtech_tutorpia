<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Teststudent
        DB::table('users')->insert([
            'name' => 'TestStudent',
            'email' => 'student@student',
            'password' => bcrypt('Tutorpia'),
            'Rolle' => 'member',
            'created_at'=>Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'TestStudent2',
            'email' => 'student@student2',
            'password' => bcrypt('Tutorpia'),
            'Rolle' => 'member',
            'created_at'=>Carbon::now()
        ]);
        //TestTutor
        DB::table('users')->insert([
            'name' => 'TestTutor',
            'email' => 'Tutor@Tutor',
            'password' => bcrypt('Tutorpia'),
            'Rolle' => 'member',
            'created_at'=>Carbon::now()
        ]);

        //TestProf
        DB::table('users')->insert([
            'name' => 'TestProf',
            'email' => 'Prof@Prof',
            'password' => bcrypt('Tutorpia'),
            'Rolle' => 'member',
            'created_at'=>Carbon::now()
        ]);
        // Admin
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'Admin@Admin',
            'password' => bcrypt('Tutorpia'),
            'Rolle' => 'admin',
            'created_at'=>Carbon::now()
        ]);
    }
}
