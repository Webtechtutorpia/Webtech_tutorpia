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
        //Teststudent
        DB::table('users')->insert([
            'name' => 'TestStudent',
            'email' => 'student@student',
            'password' => 'Tutorpia',
            'Rolle' => 'Student'
        ]);
        //TestTutor
        DB::table('users')->insert([
            'name' => 'TestTutor',
            'email' => 'Tutor@Tutor',
            'password' => 'Tutorpia',
            'Rolle' => 'Tutor'
        ]);

        //TestProf
        DB::table('users')->insert([
            'name' => 'TestProf',
            'email' => 'Prof@Prof',
            'password' => 'Tutorpia',
            'Rolle' => 'Prof'
        ]);
    }
}
