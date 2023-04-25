<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('Title');
            $table->string('Tags');
            $table->string('Company');
            $table->string('Location');
            $table->string('Email');
            $table->string('Website');
            $table->string('Logo')->nullable();
            $table->longText('Description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    { 
        Schema::dropIfExists('users');
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('listings');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        
    }
};
