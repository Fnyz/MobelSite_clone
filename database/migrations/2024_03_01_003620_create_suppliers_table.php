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
       
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string("supp_company");
            $table->string("supp_address")->nullable();
            $table->string("supp_phone")->nullable();
            $table->string("supp_image")->nullable();
            $table->timestamps();
        });



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
