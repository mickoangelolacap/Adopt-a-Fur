<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
        	[
	        	[
		        	'category_name' => 'Dog',
		        	'created_at' => Carbon::now(),
		        	'updated_at' => Carbon::now()
	        	],
	        	[
	        		'category_name' => 'Cat',
	        		'created_at' => Carbon::now(),
		        	'updated_at' => Carbon::now()
	        	]
        	]
    	);
    }
}
