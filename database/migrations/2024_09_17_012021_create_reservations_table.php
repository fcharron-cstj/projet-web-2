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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->date("arrival")->nullable();
            $table->date("departing")->nullable();
            $table->foreignId("user_id")->constrained();
            $table->foreignId("package_id")->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */ #
    public function down(): void
    {
        //
    }
};
