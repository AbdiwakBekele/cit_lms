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
            $table->unsignedBigInteger('section_id');

            $table->foreign('classroom_id')
                    ->references('id')
                    ->on('classrooms')
                    ->onDelete('cascade');

            $table->foreign('section_id')
                    ->references('id')
                    ->on('sections')
                    ->onDelete('cascade');
            
            $table->string('score');
            $table->integer('is_passed')->default(0);
            $table->timestamps();
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