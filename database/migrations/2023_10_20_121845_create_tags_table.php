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
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('color')->nullable();
            $table->string('style')->nullable(); // Gaya atau motif tag baju yang bagus
            $table->string('occasion')->nullable(); // Kesempatan atau acara yang sesuai dengan tag baju yang bagus
            $table->string('material')->nullable(); // Bahan pembuatan tag baju yang bagus
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
        Schema::dropIfExists('tags');
    }
};
