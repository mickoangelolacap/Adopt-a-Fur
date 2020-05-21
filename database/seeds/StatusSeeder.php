<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert(
     		[
     			[
     				'status_name' => 'Pending',
     				'created_at' => Carbon::now(),
     				'updated_at' => Carbon::now()
     			],
     			[
     				'status_name' => 'Screening',
     				'created_at' => Carbon::now(),
     				'updated_at' => Carbon::now()
     			],
     			[
     				'status_name' => 'Adopted',
     				'created_at' => Carbon::now(),
     				'updated_at' => Carbon::now()
     			]
     		]
     	);
    }
}
