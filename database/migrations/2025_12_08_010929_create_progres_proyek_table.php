<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('progres_proyek', function (Blueprint $table) {
            $table->id('progress_id');
            $table->foreignId('proyek_id')->constrained('proyek', 'proyek_id')->onDelete('cascade');
            $table->foreignId('tahap_id')->constrained('tahapan_proyek', 'tahap_id')->onDelete('cascade');
            $table->decimal('persen_real', 5, 2)->default(0);
            $table->date('tanggal');
            $table->text('catatan')->nullable();
            $table->string('foto_progres')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('progres_proyek');
    }
};