<?php

use Illuminate\Database\Seeder;

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
            'Rolle' => 'Student'
        ]);

        DB::table('users')->insert([
            'name' => 'TestStudent2',
            'email' => 'student@student2',
            'password' => bcrypt('Tutorpia'),
            'Rolle' => 'Student'
        ]);
        //TestTutor
        DB::table('users')->insert([
            'name' => 'TestTutor',
            'email' => 'Tutor@Tutor',
            'password' => bcrypt('Tutorpia'),
            'Rolle' => 'Tutor'
        ]);

        //TestProf
        DB::table('users')->insert([
            'name' => 'TestProf',
            'email' => 'Prof@Prof',
            'password' => bcrypt('Tutorpia'),
            'Rolle' => 'Professor'
        ]);
        // Admin
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'Admin@Admin',
            'password' => bcrypt('Tutorpia'),
            'Rolle' => 'admin'
        ]);
    }
}
