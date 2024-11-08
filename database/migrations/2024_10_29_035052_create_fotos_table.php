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
        Schema::create('fotos', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement()->primary();
            $table->string('judul_foto');
            $table->text('deskripsi_foto');
            $table->string('image');
            $table->dateTime('tanggal_unggah')->useCurrent();
            // $table->integer('albumid')->default(0)->change();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
            // $table->dateTime('updated_at');
            // $table->dateTime('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fotos');
    }
};
