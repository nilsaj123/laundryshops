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
         
            $table->string('name'); // Patient's full name
            $table->date('date_of_birth'); // Patient's date of birth
            $table->string('birth_place'); // Place where the patient was born
            $table->integer('age_year')->nullable();
            $table->integer('age_month')->nullable(); // Age of the patient
            $table->integer('height'); // Height of the patient
            $table->integer('weight'); // Weight of the patient
            $table->string('parents_name');
            $table->integer('parent_age'); // Age of patient's parents (e.g., father's/mother's age)
            $table->string('permanent_address'); // Permanent address of the patient
            $table->string('parents_number',12); // Parent's contact number
            $table->string('gender'); // Gender of the patient (Male, Female, Other)
            $table->string('type_of_vaccine')->nullable();
         
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
