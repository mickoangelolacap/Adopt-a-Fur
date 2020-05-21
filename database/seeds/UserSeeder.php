<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
        	"name" => "johndoe",
        	"email" => "johndoe@gmail.com",
        	"password" => Hash::make('johndoe123'),
        	"mobile_no" => 12345,
        	"address" => "Makati City",
        	"role" => 0,
        	"created_at" => Carbon::now(),
        	"updated_at" => Carbon::now()
        ]);
    }
}
