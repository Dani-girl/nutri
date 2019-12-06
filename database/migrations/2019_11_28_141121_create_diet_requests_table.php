<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDietRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diet_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')
                  ->references('id')
                  ->on('users');
            $table->unsignedBigInteger('nutritionist_id')->nullable();
            $table->foreign('nutritionist_id')
                  ->references('id')
                  ->on('nutritionists');
            $table->year('birth_year');
            $table->string('sex', 20);
            $table->integer('height');
            $table->integer('weight');
            $table->string('blood_type', 10);
            $table->string('diet_type', 30);
            $table->string('physical_activity', 50);
            $table->string('past_diets_title', 100)->nullable();
            $table->string('past_diets_description', 300)->nullable();
            $table->string('past_diets_success_rate', 20)->nullable();
            $table->integer('meals_per_day');
            $table->time('late_meal_time');
            $table->string('sweets_consumption', 50);
            $table->string('alcohol_consumption', 50);
            $table->string('consuming_everyday',500);
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
        Schema::dropIfExists('diet_requests');
    }
}
