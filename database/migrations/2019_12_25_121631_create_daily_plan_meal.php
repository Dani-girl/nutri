<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyPlanMeal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_plan_meal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('daily_plan_id');
            $table->foreign('daily_plan_id')
                  ->references('id')
                  ->on('daily_plans');
            $table->unsignedBigInteger('meal_id');
            $table->foreign('meal_id')
                  ->references('id')
                  ->on('meals');
            $table->string('custom_ingredients')->nullable();
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
        Schema::dropIfExists('daily_plan_meal');
    }
}
