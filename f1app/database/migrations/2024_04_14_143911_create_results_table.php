<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('result_id');
            $table->integer('race_id')->unsigned();
            $table->foreign('race_id')->references('race_id')->on('races')->onDelete('cascade');
            $table->integer('driver_id')->unsigned();
            $table->foreign('driver_id')->references('driver_id')->on('drivers')->onDelete('cascade');
            $table->integer('finishing_position');
            $table->boolean('fastest_lap')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
