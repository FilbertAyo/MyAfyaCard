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
        Schema::create('metrics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');
            $table->string('cd');
            $table->string('viral_load');
            $table->string('ratio');
            $table->string('weight');
            $table->string('medicine');
            $table->string('dosage');
            $table->string('other_med');
            $table->string('enrolment');
            $table->string('prognosis');
            $table->string('visit_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metrics');
    }
};




