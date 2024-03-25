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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('no_flight');
            $table->string('departure_city');
            $table->string('arrival_city');
            $table->time('departure_time');
            $table->time('arrival_time');
            $table->date('departure_date');
            $table->date('arrival_date');
            $table->integer('seat');
            $table->integer('price');
            $table->unsignedBigInteger('airline_id');
            $table->timestamps();

            $table->foreign('airline_id')->references('id')->on('airlines')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
