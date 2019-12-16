<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeekMealPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('week_meal_plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('diet_request_id');
            $table->foreign('diet_request_id')
                  ->references('id')
                  ->on('diet_requests');
            $table->integer('week');
            $table->unsignedBigInteger('day1_id');
            $table->foreign('day1_id')
                  ->references('id')
                  ->on('daily_meal_plans');
            $table->unsignedBigInteger('day2_id');
            $table->foreign('day2_id')
                  ->references('id')
                  ->on('daily_meal_plans');
            $table->unsignedBigInteger('day3_id');
            $table->foreign('day3_id')
                  ->references('id')
                  ->on('daily_meal_plans');
            $table->unsignedBigInteger('day4_id');
            $table->foreign('day4_id')
                  ->references('id')
                  ->on('daily_meal_plans');
            $table->unsignedBigInteger('day5_id');
            $table->foreign('day5_id')
                  ->references('id')
                  ->on('daily_meal_plans');
            $table->unsignedBigInteger('day6_id');
            $table->foreign('day6_id')
                  ->references('id')
                  ->on('daily_meal_plans');
            $table->unsignedBigInteger('day7_id');
            $table->foreign('day7_id')
                  ->references('id')
                  ->on('daily_meal_plans');
            $table->string('avoid', 500);
            $table->string('exercise_plan', 500);
            $table->string('explanation', 500);
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
        Schema::dropIfExists('week_meal_plans');
    }
}
