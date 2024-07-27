<?php

namespace App\Livewire;

use App\Models\SiteInfo;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

#[Layout('components\layouts\backend')]
#[Title('Site Information')]
class SiteInfoComponent extends Component
{
    use WithFileUploads;

    public $name, $email, $phone, $address, $facebook, $twitter, $instagram, $linkedin, $youtube, $google_map, $logo, $favicon, $copyright, $description, $keywords, $title, $meta_title, $meta_description, $meta_keywords, $google_analytics, $google_tag_manager, $google_adsense, $google_ads, $facebook_pixel, $facebook_ads, $facebook_pixel_id, $facebook_app_id, $facebook_app_secret, $facebook_page_id, $facebook_page_token, $facebook_page_access_token, $facebook_page_secret;

    public function mount()
    {
        // Load existing site info if available


    }
    public function save()
    {
        $this->validate([
            'name' => 'required|string|',
            'email' => 'required|string|email',
            'phone' => 'required|string',
            'address' => 'required|string',

            'logo' => 'nullable|image',
            'favicon' => 'nullable|image',

            'facebook' => 'nullable|string',
            'twitter' => 'nullable|string',
            'instagram' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'youtube' => 'nullable|string',
            'google_map' => 'nullable|string',

            'copyright' => 'nullable|string',
            'description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'title' => 'nullable|string',
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',

            'google_analytics' => 'nullable|string',
            'google_tag_manager' => 'nullable|string',
            'google_adsense' => 'nullable|string',
            'google_ads' => 'nullable|string',

            'facebook_pixel' => 'nullable|string',
            'facebook_ads' => 'nullable|string',
            'facebook_pixel_id' => 'nullable|string',
            'facebook_app_id' => 'nullable|string',
            'facebook_app_secret' => 'nullable|string',
            'facebook_page_id' => 'nullable|string',
            'facebook_page_token' => 'nullable|string',
            'facebook_page_access_token' => 'nullable|string',
            'facebook_page_secret' => 'nullable|string',
        ]);

        SiteInfo::updateOrCreate(['id' => 1], [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,

            'logo' => $this->logo,
            'favicon' => $this->favicon,

            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'instagram' => $this->instagram,
            'linkedin' => $this->linkedin,
            'youtube' => $this->youtube,
            'google_map' => $this->google_map,

            'copyright' => $this->copyright,
            'description' => $this->description,
            'keywords' => $this->keywords,
            'title' => $this->title,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keywords' => $this->meta_keywords,
            'google_analytics' => $this->google_analytics,
            'google_tag_manager' => $this->google_tag_manager,
            'google_adsense' => $this->google_adsense,
            'google_ads' => $this->google_ads,

            'facebook_pixel' => $this->facebook_pixel,
            'facebook_ads' => $this->facebook_ads,
            'facebook_pixel_id' => $this->facebook_pixel_id,
            'facebook_app_id' => $this->facebook_app_id,
            'facebook_app_secret' => $this->facebook_app_secret,
            'facebook_page_id' => $this->facebook_page_id,
            'facebook_page_token' => $this->facebook_page_token,
            'facebook_page_access_token' => $this->facebook_page_access_token,
            'facebook_page_secret' => $this->facebook_page_secret,
        ]);

    }

    public function render()
    {
        return view('livewire.backend.site.site-info-component');
    }
}
