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
        DB::table('questions')->insert([
            'user_id' => 1,
            'title' => 'Apakah ini 2?',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'description' => 'A'
        ]);
        DB::table('questions')->insert([
            'user_id' => 1,
            'title' => 'Apakah 4 itu 3?',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'description' => 'You know the rules and so do I'
        ]);
        DB::table('questions')->insert([
            'user_id' => 1,
            'title' => 'Apakah bulat itu lingkaran?',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'description' => 'A full commitment is what Im thinking of'
        ]);
        DB::table('questions')->insert([
            'user_id' => 1,
            'title' => 'Apakah kotak itu persegi?',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'description' => "You wouldnt get this from any other guy"
        ]);
        DB::table('questions')->insert([
            'user_id' => 1,
            'title' => 'Apakah beda dua sama aud?',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'description' => "I just wanna tell you how I'm feeling"
        ]);
        DB::table('questions')->insert([
            'user_id' => 1,
            'title' => 'Apakah test itu?',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'description' => 'Gotta make you understand'
        ]);
        DB::table('questions')->insert([
            'user_id' => 1,
            'title' => 'Apakah ini test?',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'description' => 'Never gonna give you up'
        ]);
        DB::table('questions')->insert([
            'user_id' => 1,
            'title' => 'Apakah sudah habis?',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'description' => 'Never gonna let you down'
        ]);
        DB::table('questions')->insert([
            'user_id' => 1,
            'title' => 'Apakah semua itu test?',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'description' => 'Never gonna run around and desert you'
        ]);
        DB::table('questions')->insert([
            'user_id' => 1,
            'title' => 'Apakah bukan testing?',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'description' => 'Never gonna make you cry'
        ]);
        DB::table('questions')->insert([
            'user_id' => 1,
            'title' => 'testing?',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'description' => 'Never gonna say goodbye'
        ]);
        DB::table('questions')->insert([
            'user_id' => 1,
            'title' => 'Apakah tester ini test?',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'description' => 'Never gonna tell a lie and hurt you'
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
