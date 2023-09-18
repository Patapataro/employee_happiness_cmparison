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
        Schema::create('happiness_chart', function (Blueprint $table) {
            $table->id();
            $table->string('department')->unique();
            $table->unsignedInteger('very_happy');
            $table->unsignedInteger('happy');
            $table->unsignedInteger('content');
            $table->unsignedInteger('unhappy');
            $table->unsignedInteger('very_unhappy');
            $table->timestamps();
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
