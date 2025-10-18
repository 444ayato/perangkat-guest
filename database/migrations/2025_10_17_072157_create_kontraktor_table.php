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
    Schema::create('kontraktor', function (Blueprint $table) {
        $table->id('kontraktor_id');       // PK
        $table->foreignId('proyek_id')->constrained('proyek','proyek_id')->onDelete('cascade');
        $table->string('nama');
        $table->string('penanggung_jawab')->nullable();
        $table->string('kontak')->nullable();
        $table->text('alamat')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontraktor');
    }
};
