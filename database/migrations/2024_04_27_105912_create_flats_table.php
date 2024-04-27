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
        Schema::create('flats', function (Blueprint $table) {
            $table->id('flat_id');
            $table->foreignId('owner_id')->constrained('users');
            $table->string('title');
            $table->text('description');
            $table->string('location');
            $table->string('address');
            $table->decimal('price', 10, 2);
            $table->string('property_type');
            $table->integer('size');
            $table->integer('bed');
            $table->integer('bath');
            $table->text('flat_info');
            $table->string('booking_status')->default('none');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flats');
    }
};
