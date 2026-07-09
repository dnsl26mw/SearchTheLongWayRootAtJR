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
        Schema::create('adjacent_stations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('from_station_id')->constrained('stations');
            $table->foreignId('to_station_id')->constrained('stations');
            $table->foreignId('line_id')->constrained('lines');
            $table->decimal('distance', 5, 1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adjacent_stations');
    }
};
