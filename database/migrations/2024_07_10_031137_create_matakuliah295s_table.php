<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tb_matakuliah295', function (Blueprint $table) {
            $table->id();
            $table->string('Kode_MK', 10)->unique();
            $table->string('Nama_MK', 100);
            $table->integer('SKS');
            $table->string('Jurusan', 50);
            $table->text('Deskripsi')->nullable();
            $table->string('Silabus_File')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_matakuliah295');
    }
};
