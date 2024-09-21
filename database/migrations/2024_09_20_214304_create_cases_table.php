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
        Schema::create('cases', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->text('description');
            $table->string('status');
            $table->string('Parties_defendant');
            $table->string('Parties_Plaintiff');
            $table->string('representatives_defendant');
            $table->string('representatives_plaintiff');
            $table->string('court_date');
            $table->string('file');
            $table->string('admin_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cases');
    }
};
