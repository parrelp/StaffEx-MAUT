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
        if (!Schema::hasTable('evaluations')) {
            Schema::create('evaluations', function (Blueprint $table) {
                $table->id('id_evaluation');
                $table->foreignId('candidate_id')->constrained('candidates', 'id_candidate')->cascadeOnDelete();
                $table->foreignId('manager_id')->constrained('users', 'id_user')->cascadeOnDelete();
                $table->foreignId('department_id')->constrained('departments', 'id_department')->cascadeOnDelete();
                $table->foreignId('criteria_id')->constrained('criteria', 'id_criteria')->cascadeOnDelete();
                $table->integer('score');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
