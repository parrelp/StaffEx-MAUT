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
        Schema::create('final_scores', function (Blueprint $table) {
            $table->id('id_final');
            $table->unsignedBigInteger('candidate_id');
            $table->unsignedBigInteger('department_id');
            $table->decimal('final_score', 5, 2);
            $table->integer('rank')->nullable();
            for ($i = 1; $i <= 7; $i++) {
                $table->decimal("C$i", 5, 2)->nullable();
            }
            $table->foreign('candidate_id')->references('id_candidate')->on('candidates')->onDelete('cascade');
            $table->foreign('department_id')->references('id_department')->on('departments')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('final_scores');
    }
};
