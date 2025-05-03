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
        Schema::table('post_views', function (Blueprint $table) {
            // Tambahkan kolom device_id sebagai string 32 karakter (untuk menyimpan hash md5)
            $table->string('device_id', 32)->nullable()->after('ip_address');

            // Tambahkan index composite untuk performa query
            $table->index(['post_id', 'device_id'], 'post_views_post_id_device_id_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('post_views', function (Blueprint $table) {
            // Hapus index terlebih dahulu
            $table->dropIndex('post_views_post_id_device_id_index');

            // Hapus kolom device_id
            $table->dropColumn('device_id');
        });
    }
};
