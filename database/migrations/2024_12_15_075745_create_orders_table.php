<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // ID Pemesanan otomatis
            $table->string('nama'); // Nama pemesan
            $table->text('alamat_lengkap'); // Alamat lengkap pemesan
            $table->string('no_hp'); // Nomor HP pemesan
            $table->string('email'); // Email pemesan
            $table->enum('pickup_delivery', ['pickup', 'delivery'])->nullable(); // Pickup atau delivery
            $table->integer('jumlah')->default(1); // Jumlah barang yang dipesan
            $table->enum('category', ['shoes', 'bags', 'caps']); // Kategori barang
            $table->string('service'); // Layanan yang dipilih (dinamis berdasarkan kategori)
            $table->text('note')->nullable(); // Catatan tambahan
            $table->enum('progress', ['pending', 'on progress', 'done'])->default('pending'); // Status progres pemesanan
            $table->timestamps(); // Created at dan Updated at
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
