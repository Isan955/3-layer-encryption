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
        // Tabel untuk harga layanan
Schema::create('service_prices', function (Blueprint $table) {
    $table->id();
    $table->string('service_name'); // Nama layanan (misal: FastClean, Deep Clean, dll)
    $table->enum('category', ['shoes', 'bags', 'caps']); // Menyatakan kategori layanan
    $table->decimal('price', 10, 2); // Harga layanan
    $table->timestamps(); // Created & Updated at
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_prices');
    }
};
