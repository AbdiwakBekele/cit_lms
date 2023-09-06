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
        Schema::create('scholarships', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            
            $table->string('fullname');
            $table->string('age');
            $table->string('gender');
            $table->string('email');
            $table->string('phone');
            
            // Address
            $table->string('city');
            $table->string('subcity');
            
            // Education 
            $table->string('level_of_education');
            $table->string('work_status');
            $table->string('current_occupation');
            $table->string('work_experience');

            // Essay
            $table->longText('essay');

            // Document
            $table->string('resume')->nullable();
            $table->string('financial')->nullable();

            $table->string('status')->nullable();

            $table->foreign('course_id')
                    ->references('id')
                    ->on('courses')
                    ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholarships');
    }
};