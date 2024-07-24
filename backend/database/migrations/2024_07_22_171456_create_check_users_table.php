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
        Schema::create('check_users', function (Blueprint $table) {
            $table->id();
            $table->integer("frontuser_id");
            $table->date("start_date");
            $table->date("end_date");
            $table->integer("limit_durations_id");
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chcek_users');
    }
};
