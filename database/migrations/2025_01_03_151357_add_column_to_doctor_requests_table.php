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
        Schema::table('doctor_requests', function (Blueprint $table) {
            $table->string('Facebook')->after('address');
            $table->string('Instagram')->after('Facebook');
            $table->string('Twitter')->after('Instagram');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('doctor_requests', function (Blueprint $table) {
            //
        });
    }
};
