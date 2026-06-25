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
        if (!Schema::hasTable('criteria_range')) {
            Schema::create('criteria_range', function (Blueprint $table) {
                $table->id('id_range');
                $table->foreignId('department_id')->constrained('departments', 'id_department');
                $table->foreignId('criteria_id')->constrained('criteria', 'id_criteria');
                $table->decimal('min_score', 5, 2);
                $table->decimal('max_score', 5, 2);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('criteria_range');
    }
};
