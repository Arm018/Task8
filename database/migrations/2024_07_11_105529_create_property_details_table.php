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
        Schema::create('property_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id');
            $table->text('description')->nullable();
            $table->enum('building_age', ['0 - 1 Years', '0 - 5 Years', '0 - 10 Years', '0 - 20 Years', '0 - 50 Years', '50 + Years'])->nullable();
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->boolean('air_conditioning')->default(false);
            $table->boolean('swimming_pool')->default(false);
            $table->boolean('central_heating')->default(false);
            $table->boolean('laundry_room')->default(false);
            $table->boolean('gym')->default(false);
            $table->boolean('alarm')->default(false);
            $table->boolean('window_covering')->default(false);
            $table->string('contact_name')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_details');
    }
};
