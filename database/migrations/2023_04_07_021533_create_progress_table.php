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
        Schema::create('progress', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('classroom_id');
            $table->unsignedBigInteger('content_id');
            $table->string('score')->nullable();
            $table->integer('has_taken');
            $table->integer('is_passed')->default(0);
            $table->timestamps();

            $table->foreign('classroom_id')
                    ->references('id')
                    ->on('classrooms')
                    ->onDelete('cascade');

            $table->foreign('content_id')
                    ->references('id')
                    ->on('contents')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progress');
    }
};