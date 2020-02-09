<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyPlanWeekPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_plan_week_plan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('week_plan_id');
            $table->foreign('week_plan_id')
                  ->references('id')
                  ->on('week_plans');
            $table->unsignedBigInteger('daily_plan_id');
            $table->foreign('daily_plan_id')
                  ->references('id')
                  ->on('daily_plans');
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
        Schema::dropIfExists('daily_plan_week_plan');
    }
}
