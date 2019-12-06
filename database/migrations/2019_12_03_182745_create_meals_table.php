<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('nutritionist_id')->nullable();
            $table->foreign('nutritionist_id')
                  ->references('id')
                  ->on('nutritionists');
            $table->string('title');
            $table->string('meal_type');
            $table->string('diet_type');
            $table->integer('preparation_time');
            $table->integer('cooking_time');
            $table->string('instructions');
            $table->string('original_ingredients');
            $table->integer('calories');
            $table->integer('fat');
            $table->integer('carbs');
            $table->integer('protein');
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
        Schema::dropIfExists('meals');
    }
}
