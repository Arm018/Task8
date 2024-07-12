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
            Schema::create('properties', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->string('title');
                $table->enum('status', ['For Sale', 'For Rent']);
                $table->string('type');
                $table->decimal('price', 10, 2);
                $table->integer('area');
                $table->integer('rooms');
                $table->string('address');
                $table->string('city');
                $table->string('state');
                $table->string('zip_code');
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};