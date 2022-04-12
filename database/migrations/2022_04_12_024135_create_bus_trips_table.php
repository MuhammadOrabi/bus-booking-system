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
        Schema::create('bus_trips', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('trip_id')->nullable()->unsigned();
            $table->foreign('trip_id')->references('id')->on('trips')->onDelete('SET NUll');

            $table->bigInteger('bus_id')->nullable()->unsigned();
            $table->foreign('bus_id')->references('id')->on('buses')->onDelete('SET NUll');

            $table->time('start_time')->nullable()->index();
            $table->date('date')->index();

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
        Schema::dropIfExists('bus_trips');
    }
};
