<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('pin', 12)->after('password')->nullable(); // tambah kolom pin
            $table->string('username_encrypted')->nullable(); // kalau mau simpan hasil enkripsi
            $table->string('password_encrypted')->nullable(); // hasil enkripsi password
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['pin', 'username_encrypted', 'password_encrypted']);
        });
    }
};
