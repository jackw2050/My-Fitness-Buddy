<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeFoodNutritionColumnsToDecimal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('food', function (Blueprint $table) {
            $table->decimal('protein', 8, 2)->change();
            $table->decimal('carbs', 8, 2)->change();
            $table->decimal('fat', 8, 2)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('food', function (Blueprint $table) {
            $table->string('protein')->change();
            $table->string('carbs')->change();
            $table->string('fat')->change();
        });
    }
}
