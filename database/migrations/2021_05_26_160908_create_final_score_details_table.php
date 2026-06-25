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
        if (!Schema::hasTable('final_score_details')) {
            Schema::create('final_score_details', function (Blueprint $table) {
                $table->id('id_detail');
                $table->foreignId('final_id')->constrained('final_scores', 'id_final')->cascadeOnDelete();
                $table->foreignId('criteria_id')->constrained('criteria', 'id_criteria')->cascadeOnDelete();
                $table->decimal('weighted_score', 5, 2);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('final_score_details');
    }
};
