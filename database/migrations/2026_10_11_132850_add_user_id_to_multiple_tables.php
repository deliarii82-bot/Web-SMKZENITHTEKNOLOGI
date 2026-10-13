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
    // Sesuaikan nama tabel di bawah ini dengan nama aslinya di database kamu
    $tables = ['pengumumans', 'galeris', 'berita', 'ekstrakulikulers', 'prestasi'];

   foreach ($tables as $tableName) {
        if (Schema::hasTable($tableName) && !Schema::hasColumn($tableName, 'id_user')) {
            Schema::table($tableName, function (Blueprint $table) {
                $table->unsignedBigInteger('id_user')->nullable();
            });
        }
    }
}

    /**
     * Reverse the migrations.
     */
  public function down(): void
{
    $tables = ['pengumumans', 'galeris', 'berita', 'ekstrakulikulers', 'prestasi'];

    foreach ($tables as $tableName) {
        Schema::table($tableName, function (Blueprint $table) {
            $table->dropColumn('id_user');
        });
    }
}
};
