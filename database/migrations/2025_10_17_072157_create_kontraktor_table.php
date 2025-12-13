<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kontraktor', function (Blueprint $table) {
            $table->id('kontraktor_id');
            $table->string('nama_kontraktor', 100);
            $table->string('penanggung_jawab', 100);
            $table->string('kontak', 20)->nullable();
            $table->text('alamat');
            $table->string('email', 100)->nullable();
            $table->string('telepon', 20)->nullable();
            $table->string('npwp', 25)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kontraktor');
    }
};