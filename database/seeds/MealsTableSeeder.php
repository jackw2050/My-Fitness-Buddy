<?php

use Illuminate\Database\Seeder;

class MealsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       			DB::table('meals')->insert([
				'user_id' => 1,
				'name'=>'lunch',
				'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
				'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
				]);

    }
}
