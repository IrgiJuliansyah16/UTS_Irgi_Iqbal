<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active'); // Menggunakan enum untuk status
            $table->string('color')->nullable();
            $table->string('size')->nullable(); // Ukuran
            $table->string('season')->nullable(); // Musim
            $table->string('material')->nullable(); // Bahan
            $table->timestamps();
            $table->softDeletes(); // Jika menggunakan soft delete
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
