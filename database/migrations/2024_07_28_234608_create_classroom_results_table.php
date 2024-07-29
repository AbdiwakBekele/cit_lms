<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('classroom_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('classroom_id');
            // Theory Part
            $table->string('theory_l01');
            $table->string('theory_l02');
            $table->string('theory_l03');
            $table->string('theory_l04');
            $table->string('theory_avg');

            // Practice Part
            $table->string('practice_l01');
            $table->string('practice_l02');
            $table->string('practice_l03');
            $table->string('practice_l04');
            $table->string('practice_avg');

            // Cooperative Part
            $table->string('cooperative_l01');
            $table->string('cooperative_l02');
            $table->string('cooperative_l03');
            $table->string('cooperative_l04');
            $table->string('cooperative_avg');

            // Total
            $table->string('total');
            $table->timestamps();

            $table->foreign('classroom_id')
                ->references('id')
                ->on('classrooms')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('classroom_results');
    }
};
