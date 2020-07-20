<?php

use Illuminate\Database\Seeder;

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
		    'email' => 'test@gmail.com',
		    'password' => Hash::make('password'),
        ]);
        DB::table('questions')->insert([
            'user_id' => 1,
            'question' => 'Apakah ini test?',
        ]);
        DB::table('answers')->insert([
            'user_id' => 1,
            'question_id' => 1,
            'answer' => 'Ya.',
        ]);
    }
}
