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
        Schema::create('ship_positions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('mmsi');
            $table->smallInteger('status');
            $table->smallInteger('stationId');
            $table->smallInteger('speed');
            $table->decimal('lon', 10, 7);
            $table->decimal('lat', 10, 7);
            $table->smallInteger('course');
            $table->smallInteger('heading');
            $table->string('rot');
            $table->bigInteger('timestamp');
            
            $table->index('mmsi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ship_positions');
    }
};
