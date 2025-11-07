<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('proyek', function (Blueprint $table) {

            // Tambah kode_proyek kalau belum ada
            if (!Schema::hasColumn('proyek', 'kode_proyek')) {
                $table->string('kode_proyek')->unique()->after('proyek_id');
            }

            // Tambahkan kolom yang belum ada
            if (!Schema::hasColumn('proyek', 'lokasi')) {
                $table->string('lokasi', 255)->nullable()->after('nama_proyek');
            }

            if (!Schema::hasColumn('proyek', 'tahun')) {
                $table->integer('tahun')->nullable()->after('lokasi');
            }

            if (!Schema::hasColumn('proyek', 'anggaran')) {
                $table->decimal('anggaran', 15, 2)->nullable()->after('tahun');
            }

            if (!Schema::hasColumn('proyek', 'sumber_dana')) {
                $table->string('sumber_dana', 100)->nullable()->after('anggaran');
            }

            if (!Schema::hasColumn('proyek', 'deskripsi')) {
                $table->text('deskripsi')->nullable()->after('sumber_dana');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('proyek', function (Blueprint $table) {
            if (Schema::hasColumn('proyek', 'kode_proyek')) {
                $table->dropColumn('kode_proyek');
            }
            if (Schema::hasColumn('proyek', 'lokasi')) {
                $table->dropColumn(['lokasi', 'tahun', 'anggaran', 'sumber_dana', 'deskripsi']);
            }
        });
    }
};
