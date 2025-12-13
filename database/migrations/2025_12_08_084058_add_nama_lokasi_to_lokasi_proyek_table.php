<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('lokasi_proyek', function (Blueprint $table) {
            if (!Schema::hasColumn('lokasi_proyek', 'nama_lokasi')) {
                $table->string('nama_lokasi')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('lokasi_proyek', function (Blueprint $table) {
            if (Schema::hasColumn('lokasi_proyek', 'nama_lokasi')) {
                $table->dropColumn('nama_lokasi');
            }
        });
    }
};
