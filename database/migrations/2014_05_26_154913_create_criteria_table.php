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
        if (!Schema::hasTable('criteria')) {
            Schema::create('criteria', function (Blueprint $table) {
                $table->id('id_criteria');
                $table->string('code', 10);
                $table->string('name', 100);
                $table->decimal('weight', 5, 2);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('criteria');
    }
};
