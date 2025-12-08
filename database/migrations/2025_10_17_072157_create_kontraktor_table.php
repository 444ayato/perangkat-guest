<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKontraktorTable extends Migration
{
    public function up()
    {
        Schema::create('kontraktor', function (Blueprint $table) {
            $table->id('kontraktor_id');
            $table->unsignedBigInteger('proyek_id');
            $table->string('nama');
            $table->string('penanggung_jawab')->nullable();
            $table->string('kontak')->nullable();
            $table->text('alamat')->nullable();
            $table->timestamps();

            $table->foreign('proyek_id')->references('proyek_id')->on('proyek')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('kontraktor');
    }
}
