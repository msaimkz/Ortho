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
        Schema::create('doctor_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('city');
            $table->string('phone');
            $table->integer('age');
            $table->string('speciality');
            $table->enum('gender',['male','female']);
            $table->date('date_of_birth');
            $table->text('bio');
            $table->text('address');
            $table->string('MedicalSchool');
            $table->string('Certifications');
            $table->string('Experience')->nullable();
            $table->string('Internship')->nullable();
            $table->string('profile_img');
            $table->string('graduate_degree');
            $table->string('Facebook');
            $table->string('Instagram');
            $table->string('Twitter');
            $table->enum('status',['approve','reject','pending'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_requests');
    }
};
