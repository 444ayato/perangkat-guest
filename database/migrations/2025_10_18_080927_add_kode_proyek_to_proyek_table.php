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
        if (!Schema::hasColumn('proyek', 'kode_proyek')) {
            $table->string('kode_proyek')->unique()->after('proyek_id');
        }
    });
}

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('proyek', function (Blueprint $table) {
        if (Schema::hasColumn('proyek', 'kode_proyek')) {
            $table->dropColumn('kode_proyek');
        }
    });
}
};
