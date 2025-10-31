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
        Schema::create('services', function (Blueprint $table) {
            $table->id(); // ID layanan
            $table->string('service_name'); // Nama layanan
            $table->enum('category', ['shoes', 'bags', 'caps']); // Kategori (shoes, bags, caps)
            $table->integer('price')->nullable(); // Harga layanan
            $table->timestamps(); // Created at dan Updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
