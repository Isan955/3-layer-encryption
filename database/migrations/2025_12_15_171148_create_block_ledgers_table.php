<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('block_ledgers', function (Blueprint $table) {
            $table->id();
            $table->string('table_name');        // contoh: orders
            $table->unsignedBigInteger('record_id'); // id order
            $table->longText('data');            // snapshot order
            $table->timestamp('timestamp');
            $table->string('previous_hash', 64);
            $table->string('current_hash', 64);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('block_ledgers');
    }
};
