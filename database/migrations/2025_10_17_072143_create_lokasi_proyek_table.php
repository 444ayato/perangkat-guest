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
    Schema::create('lokasi_proyek', function (Blueprint $table) {
        $table->id('lokasi_id');            // PK
        $table->foreignId('proyek_id')->constrained('proyek','proyek_id')->onDelete('cascade');
        $table->decimal('lat', 10, 7)->nullable();
        $table->decimal('lng', 10, 7)->nullable();
        $table->json('geojson')->nullable(); // jika perlu geojson
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lokasi_proyek');
    }
};
