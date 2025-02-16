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
        Schema::create('school', function (Blueprint $table) {
            $table->char('npsn', 8)->primary();
            $table->string('nama_sekolah')->nullable();
            $table->string('alamat')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('email')->nullable();
            $table->string('nama_kepsek')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school');
    }
};
