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
        Schema::create('table_borrowings', function (Blueprint $table) {
            $table->id();
            $table->string('nis');
            $table->string('nama_member');
            $table->string('rombel');
            $table->string('rayon');
            $table->string('judul_book');
            $table->string('petugas');
            $table->date('tgl_pinjam')->nullable();
            $table->date('tgl_kembali');
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
        Schema::dropIfExists('table_borrowings');
    }
};
