<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgresProyekTable extends Migration
{
    public function up()
    {
        Schema::create('progres_proyek', function (Blueprint $table) {
            $table->id('progres_id');
            $table->unsignedBigInteger('proyek_id');
            $table->unsignedBigInteger('tahap_id');
            $table->decimal('persen_real', 5, 2)->default(0);
            $table->date('tanggal');
            $table->text('catatan')->nullable();
            $table->timestamps();

            // FK (pastikan tabel proyek & tahapan ada)
            $table->foreign('proyek_id')->references('proyek_id')->on('proyek')->onDelete('cascade');
            $table->foreign('tahap_id')->references('tahap_id')->on('tahapan_proyek')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('progres_proyek');
    }
}
