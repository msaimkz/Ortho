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
        Schema::table('appoinments', function (Blueprint $table) {
            $table->string('token_no')->unique()->after('doctor_cancellation_reason');
            $table->enum('AppointmentNotiyEmail',['yes','no'])->default('no')->after('token_no');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('appoinments', function (Blueprint $table) {
            //
        });
    }
};
