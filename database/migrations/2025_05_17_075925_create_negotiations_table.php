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
        Schema::create('negotiations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('request_id'); // relasi ke request
            $table->unsignedBigInteger('sender_id');  // user pengirim pesan (murid atau guru)
            $table->text('message')->nullable();      // isi pesan diskusi (opsional)
            $table->decimal('harga', 15, 2)->nullable(); // harga negosiasi (opsional)
            $table->string('waktu')->nullable();         // waktu pelaksanaan negosiasi (opsional)
            $table->timestamps();

            $table->foreign('request_id')->references('id')->on('requests')->onDelete('cascade');
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('negotiations');
    }
};
