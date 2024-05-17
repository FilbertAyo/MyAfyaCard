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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->string('patient_email');
            $table->string('gender');
            $table->string('birth_date');
            $table->string('street');
            $table->string('district');
            $table->string('city');
            $table->string('country');
            $table->string('allergy');
            $table->string('family_exposure');
            $table->string('confirmed');
            $table->string('co_year');
            $table->string('partner');
            $table->string('supporter');
            $table->string('relation');
            $table->string('sup_address');
            $table->string('sup_contact');
            $table->string('local_leader');
            $table->string('local_contact');
            $table->string('mark')->default('-');
            $table->string('stage');
            $table->string('reason');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
