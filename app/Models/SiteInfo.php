<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'youtube',
        'google_map',
        'logo',
        'favicon',
        'copyright',
        'description',
        'keywords',
        'title',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'google_analytics',
        'google_tag_manager',
        'google_adsense',
        'google_ads',
        'facebook_pixel',
        'facebook_ads',
        'facebook_pixel_id',
        'facebook_app_id',
        'facebook_app_secret',
        'facebook_page_id',
        'facebook_page_token',
        'facebook_page_access_token',
        'facebook_page_secret',
    ];
}
