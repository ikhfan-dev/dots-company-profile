<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('platform_steps', function (Blueprint $table) {
            $table->id();
            $table->integer('step_number')->default(1);
            $table->json('title');
            $table->json('description');
            $table->string('icon')->default('cpu');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('platform_steps');
    }
};
