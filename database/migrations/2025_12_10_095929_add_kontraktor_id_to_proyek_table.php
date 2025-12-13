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
            $table->unsignedBigInteger('kontraktor_id')->nullable()->after('lokasi_id');
            
            $table->foreign('kontraktor_id')
                  ->references('kontraktor_id')
                  ->on('kontraktor')
                  ->onDelete('set null')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('proyek', function (Blueprint $table) {
            $table->dropForeign(['kontraktor_id']);
            $table->dropColumn('kontraktor_id');
        });
    }
};