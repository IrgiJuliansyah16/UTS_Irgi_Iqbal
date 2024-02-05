<?php

// File: database/migrations/2024_01_01_create_payments_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->string('metode_pembayaran'); // Diganti menjadi bahasa Indonesia
            $table->decimal('jumlah_pembayaran', 8, 2); // Diganti menjadi bahasa Indonesia
            $table->timestamps();

            // Jika Anda ingin menggunakan order_id sebagai foreign key, hilangkan komentar pada baris di bawah
            // $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
