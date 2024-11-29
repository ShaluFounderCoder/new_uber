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
        Schema::create('check_trip', function (Blueprint $table) {
            $table->id();
            $table->string('userid');
            $table->string('from_address');
            $table->string('from_latitude');
            $table->string('from_longitude');
            $table->string('to_address');
            $table->string('to_latitude');
            $table->string('to_longitude');
            $table->string('servicetype_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('check_trip');
    }
};
