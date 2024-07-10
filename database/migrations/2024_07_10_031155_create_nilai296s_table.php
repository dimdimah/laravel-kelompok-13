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
        Schema::create('tb_nilai296', function (Blueprint $table) {
            $table->id();
            $table->string('NIM', 10);
            $table->integer('Semester');
            $table->string('Tahun_Ajaran', 9);
            $table->string('Bukti_Nilai_File')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_nilai296');
    }
};
