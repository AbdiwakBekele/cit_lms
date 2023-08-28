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
        Schema::create('match__answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('answer_id');
            $table->unsignedBigInteger('match_row_id');
            $table->unsignedBigInteger('match_column_id');
            $table->timestamps();

            $table->foreign('answer_id')
                    ->references('id')
                    ->on('answers')
                    ->onDelete('cascade');

            $table->foreign('match_row_id')
                    ->references('id')
                    ->on('match__rows')
                    ->onDelete('cascade');

            $table->foreign('match_column_id')
                    ->references('id')
                    ->on('match__columns')
                    ->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('match__answers');
    }
};