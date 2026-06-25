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
        if (!Schema::hasTable('criteria_parameters_departments')) {
            Schema::create('criteria_parameters_departments', function (Blueprint $table) {
                $table->id('id_param');
                $table->foreignId('criteria_id')->constrained('criteria', 'id_criteria')->cascadeOnDelete();
                $table->foreignId('department_id')->constrained('departments', 'id_department')->cascadeOnDelete();
                $table->string('label', 50);
                $table->integer('score');
                $table->text('description')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('criteria_parameters_departments');
    }
};
