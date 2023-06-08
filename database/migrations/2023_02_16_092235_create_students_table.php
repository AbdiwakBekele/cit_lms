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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('age');
            $table->string('gender');
            $table->string('email');
            $table->string('password');
            $table->string('phone');
            
            // Address
            $table->string('city');
            $table->string('subcity');
            $table->string('house_no');
            
            // Social Media
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('twitter')->nullable();
            
            // Education 
            $table->string('level_of_education');
            $table->string('work_status');
            $table->string('current_occupation');
            $table->string('work_experience');

            $table->string('profile_img')->nullable();
            $table->integer('is_approved')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};