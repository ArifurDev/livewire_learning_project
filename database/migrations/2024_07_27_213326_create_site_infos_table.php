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
        Schema::create('site_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();

            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();

            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('youtube')->nullable();

            $table->string('google_map')->nullable();
            $table->string('copyright')->nullable();
            $table->string('description')->nullable();
            $table->string('keywords')->nullable();
            $table->string('title')->nullable();
            
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('google_analytics')->nullable();
            $table->string('google_tag_manager')->nullable();
            $table->string('google_adsense')->nullable();
            $table->string('google_ads')->nullable();

            $table->string('facebook_pixel')->nullable();
            $table->string('facebook_ads')->nullable();
            $table->string('facebook_pixel_id')->nullable();
            $table->string('facebook_app_id')->nullable();
            $table->string('facebook_app_secret')->nullable();
            $table->string('facebook_page_id')->nullable();
            $table->string('facebook_page_token')->nullable();
            $table->string('facebook_page_access_token')->nullable();
            $table->string('facebook_page_secret')->nullable();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_infos');
    }
};
