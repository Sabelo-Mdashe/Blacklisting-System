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
        Schema::create('blacklistings', function (Blueprint $table) {
            $table->id();
            // $table->mediumText('Blacklisting_Reason');
            $table->string('candidate_firstname');
            $table->string('candidate_lastname');
            $table->string('school');
            $table->mediumText('blacklist_reason');
            $table->bigInteger('student_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blacklistings');
    }
};
