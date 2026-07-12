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
        Schema::create('stations', function (Blueprint $table) {
            $table->id();
            $table->string('station_cd')->unique();
            $table->string('station_g_cd');
            $table->string('station_name');
            $table->foreignId('line_id')->constrained('lines');
            $table->foreignId('prefecture_id')->constrained('prefectures');
            $table->foreignId('metropolitan_area_id')->nullable()->constrained('metropolitan_areas');
            $table->integer('e_sort');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stations');
    }
};
