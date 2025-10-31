<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoesOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('shoes_orders', function (Blueprint $table) {
            $table->id(); // ID Pemesanan otomatis
            $table->string('nama'); // Nama pemesan
            $table->text('alamat_lengkap'); // Alamat lengkap pemesan
            $table->string('no_hp'); // Nomor HP pemesan
            $table->string('email'); // Email pemesan
            $table->enum('pickup_delivery', ['pickup', 'delivery'])->nullable(); // Pickup atau delivery
            $table->integer('jumlah_sepatu'); // Jumlah sepatu yang dipesan
            $table->enum('service', [
                'FastClean',
                'Deep Clean Medium',
                'Deep Clean Hard'
            ]); // Pilihan layanan yang diinginkan
            $table->text('note')->nullable(); // Catatan tambahan
            $table->enum('progress', ['pending', 'on progress', 'done'])->nullable(); // Status progres pemesanan
            $table->timestamps(); // Created at dan Updated at
        });
    }

    public function down()
    {
        Schema::dropIfExists('shoes_orders');
    }
}

