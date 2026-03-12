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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('career_id')->nullable()->constrained('careers')->onDelete('set null');
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('position_applied')->nullable(); // Store position title in case career is deleted
            $table->string('resume_path'); // Path to uploaded resume file
            $table->string('resume_original_name'); // Original filename
            $table->text('cover_letter')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('portfolio_url')->nullable();
            $table->integer('years_of_experience')->nullable();
            $table->string('current_location')->nullable();
            $table->string('expected_salary')->nullable();
            $table->string('notice_period')->nullable();
            
            // Spam prevention fields
            $table->string('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->string('email_hash')->index(); // For duplicate detection
            $table->timestamp('email_verified_at')->nullable();
            
            // Status tracking
            $table->enum('status', ['pending', 'reviewing', 'shortlisted', 'rejected', 'hired'])->default('pending');
            $table->text('admin_notes')->nullable();
            $table->timestamp('reviewed_at')->nullable();
            $table->foreignId('reviewed_by')->nullable()->constrained('users')->onDelete('set null');
            
            // Spam flags
            $table->boolean('is_spam')->default(false);
            $table->boolean('is_duplicate')->default(false);
            
            $table->timestamps();
            
            // Indexes for performance
            $table->index(['email', 'career_id']);
            $table->index('status');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};

