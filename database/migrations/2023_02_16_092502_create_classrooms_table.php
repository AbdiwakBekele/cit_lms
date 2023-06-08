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
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('batch_id');
            $table->unsignedBigInteger('student_id');

            $table->foreign('course_id')
                    ->references('id')
                    ->on('courses')
                    ->onDelete('cascade');

            $table->foreign('batch_id')
                    ->references('id')
                    ->on('batches')
                    ->onDelete('cascade');
            
            $table->foreign('student_id')
                    ->references('id')
                    ->on('students')
                    ->onDelete('cascade');
            
            $table->string('working_in_the_field');
            $table->string('why_interested');
            $table->string('how_did_you_hear');
            $table->string('type_of_training');
            $table->string('additional_info');
            $table->string('payment_mode');
            $table->string('payment_type');

            $table->integer('is_approved');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classrooms');
    }
};