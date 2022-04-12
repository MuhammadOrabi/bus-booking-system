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
        Schema::create('station_trips', function (Blueprint $table) {
            $table->bigInteger('trip_id')->nullable()->unsigned();
            $table->foreign('trip_id')->references('id')->on('trips')->onDelete('SET NUll');

            $table->bigInteger('station_id')->nullable()->unsigned();
            $table->foreign('station_id')->references('id')->on('stations')->onDelete('SET NUll');

            $table->integer('order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('station_trips');
    }
};
