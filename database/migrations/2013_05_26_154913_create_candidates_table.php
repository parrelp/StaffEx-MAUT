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
        if (!Schema::hasTable('candidates')) {
            Schema::create('candidates', function (Blueprint $table) {
                $table->id('id_candidate');
                $table->string('name', 100);
                $table->string('class', 50)->nullable();
                $table->string('email', 100)->nullable();
                $table->string('phone_number', 20)->nullable();
                $table->text('address')->nullable();
                $table->string('photo', 255)->nullable();
                $table->string('document', 255)->nullable();
                $table->foreignId('department_id')->nullable()->constrained('departments', 'id_department');
                $table->enum('status', ['belum_dinilai', 'sedang_dinilai', 'sudah_dinilai'])->default('belum_dinilai');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
