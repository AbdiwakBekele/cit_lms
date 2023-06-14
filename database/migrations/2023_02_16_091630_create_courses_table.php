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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_category_id');
            $table->foreign('course_category_id')
                ->references('id')
                ->on('course_categories')
                ->onDelete('cascade');
            $table->string('course_name');
            $table->string('short_name');
            $table->string('course_image');
            $table->string('course_intro')->nullable();;
            $table->string('course_duration');
            $table->string('course_price');
            $table->longText('description');
            $table->integer('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};