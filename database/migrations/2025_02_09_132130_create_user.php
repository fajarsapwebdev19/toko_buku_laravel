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
        Schema::create('users', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->integer('role_id')->nullable();
            $table->string('personal_id')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('email')->nullable();
            $table->string('npsn')->nullable();
            $table->string('token_reset')->nullable();
            $table->enum('status_verify', ['Y', 'N']);
            $table->enum('status_account', ['Y', 'N'])->nullable();
            $table->datetime('verify_at')->nullable();
            $table->datetime('last_login')->nullable();
            $table->datetime('created_at')->nullable();
            $table->datetime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
