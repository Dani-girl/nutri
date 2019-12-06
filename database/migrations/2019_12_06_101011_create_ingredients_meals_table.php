<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientsMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients_meals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ingredient_id');
            $table->foreign('ingredient_id')
                  ->references('id')
                  ->on('ingredients');
            $table->unsignedBigInteger('meal_id');
            $table->foreign('meal_id')
                  ->references('id')
                  ->on('meals');
            $table->string('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredients_meals');
    }
}
