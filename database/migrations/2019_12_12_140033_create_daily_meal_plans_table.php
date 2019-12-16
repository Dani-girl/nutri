<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyMealPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_meal_plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('week');
            $table->integer('day');
            $table->unsignedBigInteger('breakfast_id')->nullable();
            $table->foreign('breakfast_id')
                  ->references('id')
                  ->on('meals');
            $table->unsignedBigInteger('custom_breakfast_id')->nullable();
            $table->foreign('custom_breakfast_id')
                  ->references('id')
                  ->on('custom_ingredients');
            $table->unsignedBigInteger('lunch_id')->nullable();
            $table->foreign('lunch_id')
                  ->references('id')
                  ->on('meals');
            $table->unsignedBigInteger('custom_lunch_id')->nullable();
            $table->foreign('custom_lunch_id')
                  ->references('id')
                  ->on('custom_ingredients');
            $table->unsignedBigInteger('dinner_id')->nullable();
            $table->foreign('dinner_id')
                  ->references('id')
                  ->on('meals');
            $table->unsignedBigInteger('custom_dinner_id')->nullable();
            $table->foreign('custom_dinner_id')
                  ->references('id')
                  ->on('custom_ingredients');
            $table->unsignedBigInteger('snack1_id')->nullable();
            $table->foreign('snack1_id')
                  ->references('id')
                  ->on('meals');
            $table->unsignedBigInteger('custom_snack1_id')->nullable();
            $table->foreign('custom_snack1_id')
                  ->references('id')
                  ->on('custom_ingredients');
            $table->unsignedBigInteger('snack2_id')->nullable();
            $table->foreign('snack2_id')
                  ->references('id')
                  ->on('meals');
            $table->unsignedBigInteger('custom_snack2_id')->nullable();
            $table->foreign('custom_snack2_id')
                  ->references('id')
                  ->on('custom_ingredients');
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
        Schema::dropIfExists('daily_meal_plans');
    }
}
