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
        Schema::create('artwork_infos', function (Blueprint $table) {
            $table->id();
            $table->string('artworkable_type');
            $table->unsignedBigInteger('artworkable_id');
            $table->string('trailler');
            $table->string('director');
            $table->date('production_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artwork_infos');
    }
};
