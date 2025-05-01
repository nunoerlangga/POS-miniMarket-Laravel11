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
        Schema::create('t_users', function (Blueprint $table) {
            $table->integer('id_user')->autoIncrement()->primary();
            $table->string('nama_user',100);
            $table->string('username',50);
            $table->string('password',50);
            $table->enum('role', ['admin', 'kasir'])->default('kasir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
