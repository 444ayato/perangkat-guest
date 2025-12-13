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
        Schema::table('proyek', function (Blueprint $table) {
            $table->unsignedBigInteger('lokasi_id')->nullable();
            

            $table->foreign('lokasi_id')
                ->references('lokasi_id')
                ->on('lokasi_proyek')
                ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('proyek', function (Blueprint $table) {
            $table->dropForeign(['lokasi_id']);
            $table->dropColumn('lokasi_id');
        });
    }
};
