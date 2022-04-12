<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_trips', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('trip_id')->nullable()->unsigned();
            $table->foreign('trip_id')->references('id')->on('trips')->onDelete('SET NUll');

            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NUll');

            $table->bigInteger('seat_id')->nullable()->unsigned();
            $table->foreign('seat_id')->references('id')->on('seats')->onDelete('SET NUll');

            $table->bigInteger('from_station_id')->nullable()->unsigned();
            $table->foreign('from_station_id')->references('id')->on('stations')->onDelete('SET NUll');

            $table->bigInteger('to_station_id')->nullable()->unsigned();
            $table->foreign('to_station_id')->references('id')->on('stations')->onDelete('SET NUll');

            $table->string('status')->index();
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
        Schema::dropIfExists('user_trips');
    }
};
