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
        Schema::create('pengumumans', function (Blueprint $table) {
                $table->id('id_pengumuman');
                $table->string('judul', 50);
                $table->text('isi');
                $table->date('tanggal');
                $table->enum('status', ['Publish', 'Draft'])->default('Draft');
                $table->unsignedBigInteger('id_user');
                $table->timestamps();

               $table->foreign('id_user')
              ->references('id_user')
              ->on('users')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::dropIfExists('pengumumans');
    }
};
