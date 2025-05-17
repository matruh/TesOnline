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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('murid_id'); // user dengan role murid
            $table->unsignedBigInteger('guru_id');  // user dengan role guru
            $table->enum('status', ['pending', 'accepted', 'rejected', 'deal'])->default('pending');
            $table->timestamps();

            $table->foreign('murid_id')->references('id')->on('murids')->onDelete('cascade');
            $table->foreign('guru_id')->references('id')->on('gurus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
