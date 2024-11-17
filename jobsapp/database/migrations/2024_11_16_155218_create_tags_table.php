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
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('job_listing_tag', function (Blueprint $table) {
            $table->id();

            // Foreign key for JobListing with cascading delete
            $table->foreignIdFor(App\Models\JobListing::class)
                ->constrained()
                ->cascadeOnDelete();

            // Foreign key for Tag with cascading delete
            $table->foreignIdFor(App\Models\Tag::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_listing_tag'); // Drop pivot table first
        Schema::dropIfExists('tags'); // Then drop tags table
    }
};
