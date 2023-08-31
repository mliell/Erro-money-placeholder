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
        Schema::create('teste', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('valor1');
            $table->unsignedInteger('valor2');
            $table->unsignedInteger('soma');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
