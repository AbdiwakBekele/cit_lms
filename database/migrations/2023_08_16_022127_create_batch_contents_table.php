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
        Schema::create('batch_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('batch_id');
            $table->unsignedBigInteger('content_id');
            $table->string('content_status')->nullable();
            $table->string('quiz_status')->nullable();

            $table->foreign('batch_id')
                ->references('id')
                ->on('batches')
                ->onDelete('cascade');

            $table->foreign('content_id')
                ->references('id')
                ->on('contents')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batch_contents');
    }
};