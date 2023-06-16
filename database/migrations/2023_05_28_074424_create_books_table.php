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
        Schema::create('books', function (Blueprint $table) {
            $table->id();            
            $table->string('judul');
            $table->string('isbn')->nullable();
            $table->string('category');
            $table->string('pengarang');
            $table->string('penerbit');
            $table->string('tahun_terbit');
            $table->integer('stok');
            $table->text('deskripsi')->nullable();
            $table->enum('lokasi',['rak1','rak2','rak3'])->nullable();
            $table->string('cover')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
