<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
	    // $this->call(UsersTableSeeder::class);
	    DB::table('users')->insert([
		    'name' => 'AkunTest',
		    'username' => 'akun_test',
		    'email' => 'test@gmail.com',
		    'password' => Hash::make('password'),
        ]);
        DB::table('questions')->insert([
            'user_id' => 1,
            'title' => 'Apakah ini test?',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'description' => 'Aku adalah manusia biasa, yang sempurna dan tiada salah'
        ]);
        DB::table('answers')->insert([
            'user_id' => 1,
            'question_id' => 1,
            'answer' => 'Ya.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
