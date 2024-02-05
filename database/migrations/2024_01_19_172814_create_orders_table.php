<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pelanggan'); // Tidak menggunakan foreign key
            $table->string('produk');
            $table->integer('jumlah');
            $table->decimal('total_harga_dalam_lumen', 8, 2);
            $table->timestamps();

            // Jika ingin menjadikan id_pelanggan sebagai foreign key
            // $table->foreign('id_pelanggan')->references('id')->on('pelanggans');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
