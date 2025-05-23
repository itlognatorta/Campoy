<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('violation_id'); // Link to the violation
            $table->unsignedBigInteger('violator_id');  // Link to the violator
            $table->string('ticket_number')->unique();  // Unique ticket reference
            $table->date('issue_date');
            $table->date('due_date');
            $table->decimal('fine_amount', 10, 2);
            $table->string('status')->default('unpaid'); // unpaid, paid, cancelled, etc.
            $table->timestamps();

            // Foreign keys
            $table->foreign('violation_id')->references('violation_id')->on('violations')->onDelete('cascade');
            $table->foreign('violator_id')->references('id')->on('violators')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
