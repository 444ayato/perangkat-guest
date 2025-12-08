<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLokasiProyekTable extends Migration
{
    public function up()
    {
        Schema::create('lokasi_proyek', function (Blueprint $table) {
            $table->id('lokasi_id');
            $table->unsignedBigInteger('proyek_id');
            $table->decimal('lat', 10, 7)->nullable();
            $table->decimal('lng', 10, 7)->nullable();
            $table->longText('geojson')->nullable();
            $table->timestamps();

            $table->foreign('proyek_id')->references('proyek_id')->on('proyek')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('lokasi_proyek');
    }
}
