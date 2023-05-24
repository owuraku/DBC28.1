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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
             $table->string('firstname');
             $table->string('lastname');
             $table->string('middlename')->nullable();
             $table->date('dob');
             $table->string('gender');
             $table->string('position');
             $table->string('image')->default('/temp/image.png');
             $table->boolean('is_married');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
