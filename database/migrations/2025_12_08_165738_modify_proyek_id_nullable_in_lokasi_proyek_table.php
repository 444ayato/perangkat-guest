<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('lokasi_proyek', function (Blueprint $table) {
            // Ubah proyek_id menjadi nullable
            $table->foreignId('proyek_id')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('lokasi_proyek', function (Blueprint $table) {
            // Kembalikan ke not nullable
            $table->foreignId('proyek_id')->nullable(false)->change();
        });
    }
};