<?php

use Illuminate\Database\Seeder;

class FoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


			DB::table('food')->insert([
				'meal_id' => 1,
				'food_name'=>'banana',
				'protein'=>'3',
				'carbs'=>'24',
				'fat'=>'10',
				'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
				'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
				]);



    }
    
}
