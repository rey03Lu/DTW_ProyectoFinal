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
        Schema::create('apods', function (Blueprint $table) {
            $table->id();
            $table->date('date'); // Date of image. Included in response because of default values.
            $table->string('title'); // The title of the image.
            $table->text('explanation'); // The supplied text explanation of the image.
            $table->string('media_type', 20); // The type of media (data) returned. May either be 'image' or 'video' depending on content.
            $table->string('service_version', 10); // The service version used.
            $table->string('url'); // The URL of the APOD image or video of the day.
            $table->string('hdurl')->nullable(); // The URL for any high-resolution image for that day. Returned regardless of 'hd' param setting but will be omitted in the response IF it does not exist originally at APOD.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apods');
    }
};
