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
        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->string('desa_name')->nullable();
            $table->text('location')->nullable();
            $table->string('kepala_desa_name')->nullable();
            $table->string('kepala_desa_profil')->nullable();
            $table->string('luas_petanian')->nullable();
            $table->string('luas_area')->nullable();
            $table->string('tgl_desa_dibangun')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile');
    }
};
