<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_settings', function (Blueprint $table) {
            $table->id();
            $table->string('hero_title')->default('About Gadget & Glow');
            $table->text('hero_subtitle')->nullable();
            $table->string('hero_image')->nullable();
            $table->string('story_title')->default('Our Journey & Passion');
            $table->longText('story_content')->nullable();
            $table->text('mission')->nullable();
            $table->text('vision')->nullable();
            $table->string('stat_1_number')->default('50,000+');
            $table->string('stat_1_label')->default('Happy Customers');
            $table->string('stat_2_number')->default('100%');
            $table->string('stat_2_label')->default('Authentic Products');
            $table->string('stat_3_number')->default('64');
            $table->string('stat_3_label')->default('Districts Covered');
            $table->string('stat_4_number')->default('24/7');
            $table->string('stat_4_label')->default('Support Team');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_settings');
    }
};
