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
        Schema::table('lapangans', function (Blueprint $table) {
            $table->decimal('harga_per_jam', 12, 2)->after('kondisi');
            $table->time('jam_buka')->after('harga_per_jam');
            $table->time('jam_tutup')->after('jam_buka');
            $table->text('deskripsi')->nullable()->after('jam_tutup');
            $table->string('kontak', 20)->nullable()->after('deskripsi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('lapangans', function (Blueprint $table) {
            $table->dropColumn([
                'harga_per_jam',
                'jam_buka',
                'jam_tutup',
                'deskripsi',
                'kontak',
            ]);
        });
    }
};
