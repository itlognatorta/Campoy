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
        Schema::create('role_status', function (Blueprint $table) {
            $table->id();
            $table->string('role_name'); // e.g., admin, officer, driver, etc.
            $table->timestamps();

            // Foreign key constraint          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_status');
    }
};
