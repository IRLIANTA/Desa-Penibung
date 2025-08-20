<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('developments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('total_dana');
            $table->string('thumbnail')->nullable();
            $table->string('nama_projek');
            $table->string('giver');
            $table->enum('status', ['On Going', 'Completed'])->default('On Going');
            $table->date('tanggal_pembangunan');
            $table->integer('hari')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('developments');
    }
};
