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

            $table->longText('facebook')->nullable();
            $table->longText('twitter')->nullable();
            $table->longText('instagram')->nullable();
            $table->longText('linkedin')->nullable();
            $table->longText('youtube')->nullable();

            $table->longText('google_map')->nullable();
            $table->longText('copyright')->nullable();
            $table->longText('description')->nullable();
            $table->longText('keywords')->nullable();
            $table->longText('title')->nullable();

            $table->longText('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->longText('meta_keywords')->nullable();
            $table->longText('google_analytics')->nullable();
            $table->longText('google_tag_manager')->nullable();
            $table->longText('google_adsense')->nullable();
            $table->longText('google_ads')->nullable();

            $table->longText('facebook_pixel')->nullable();
            $table->longText('facebook_ads')->nullable();
            $table->longText('facebook_pixel_id')->nullable();
            $table->longText('facebook_app_id')->nullable();
            $table->longText('facebook_app_secret')->nullable();
            $table->longText('facebook_page_id')->nullable();
            $table->longText('facebook_page_token')->nullable();
            $table->longText('facebook_page_access_token')->nullable();
            $table->longText('facebook_page_secret')->nullable();

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
