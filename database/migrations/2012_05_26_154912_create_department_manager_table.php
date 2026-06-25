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
        if (!Schema::hasTable('department_manager')) {
            Schema::create('department_manager', function (Blueprint $table) {
                $table->id('id_manager');
                $table->foreignId('user_id')->constrained('users', 'id_user')->cascadeOnDelete();
                $table->foreignId('department_id')->constrained('departments', 'id_department')->cascadeOnDelete();
                $table->enum('position', ['head', 'bph']);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('department_manager');
    }
};
