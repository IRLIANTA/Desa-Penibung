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
        Schema::create('statistik', function (Blueprint $table) {
            $table->id();
            $table->integer('jml_penduduk')->default(0);
            $table->integer('jml_rumah')->default(0);
            $table->integer('jml_pria')->default(0);
            $table->integer('jml_wanita')->default(0);
            $table->integer('jml_kepala_keluarga')->default(0);
            $table->integer('jml_kk')->default(0);
            $table->integer('pembangunan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistik');
    }
};
