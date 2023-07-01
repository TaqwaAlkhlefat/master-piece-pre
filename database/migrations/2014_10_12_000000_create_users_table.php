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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('usertype')->default(0);
            $table->string('specialization')->nullable()->default('No Specialization Added');
            $table->integer('experience')->nullable()->default(0);
            $table->string('medical_license')->nullable()->default('default.jpg');
            $table->string('certification_documents')->nullable()->default('default.jpg');
            $table->string('educational_certificates')->nullable()->default('default.jpg');
            $table->string('professional_affiliation_proof')->nullable()->default('default.jpg');
            $table->string('continuing_education_certificates')->nullable()->default('default.jpg');
            $table->boolean('admin_approval')->default(false);

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
