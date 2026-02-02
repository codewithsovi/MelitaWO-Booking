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
        Schema::create('wedding_people', function (Blueprint $table) {
            $table->id();
            $table->enum('pengantin', ['pria', 'wanita']);
            $table->string('nama_lengkap');
            $table->string('nama_panggilan');
            $table->string('alamat');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->integer('anak_ke');
            $table->string('nama_kakak')->nullable();
            $table->string('nama_adik')->nullable();
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wedding_people');
    }
};
