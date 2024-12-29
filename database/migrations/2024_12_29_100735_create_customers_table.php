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
        Schema::create('customers', function (Blueprint $table) {
            $table->id(); 
             $table->string('name'); 
             $table->string('email')->unique();
             $table->string('permanent_address'); 
         
      
       
        
           
     
            $table->string('phone_number',12);
            $table->decimal('total_bill')->nullable(); 
            $table->integer('clothes_weight')->nullable(); 
            $table->string('status')->nullable(); 
            $table->string('clothes_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
