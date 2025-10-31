<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapsOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('caps_orders', function (Blueprint $table) {
            $table->id(); // ID Pemesanan otomatis
            $table->string('nama');
            $table->text('alamat_lengkap');
            $table->string('no_hp');
            $table->string('email');
            $table->enum('pickup_delivery', ['pickup', 'delivery'])->nullable();
            $table->integer('jumlah_topi')->default(1); // Jumlah topi, default 1
            $table->enum('service', ['Deep Clean : Medium', 'Deep Clean : Hard']);
            $table->text('note')->nullable();
            $table->enum('progress', ['pending', 'on progress', 'done'])->nullable();
            $table->timestamps(); // Created & Updated at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('caps_orders');
    }
}

