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
        Schema::create('violations', function (Blueprint $table) {
            $table->id('violation_id');
            $table->unsignedBigInteger('user_id'); // Changed from driver_id to user_id
            $table->string('vehicle_plate_number');
            $table->string('violation_type');
            $table->string('location');
            $table->dateTime('date_time');
            $table->string('status');
            $table->timestamps();

            // Updated foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('violations');
    }
};
