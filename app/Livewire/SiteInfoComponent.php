<?php

namespace App\Livewire;

use App\Models\SiteInfo;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Url;

#[Layout('components\layouts\backend')]
#[Title('Site Information')]
class SiteInfoComponent extends Component
{
    use WithFileUploads;

    public $name, $email, $phone, $address, $facebook, $twitter, $instagram, $linkedin, $youtube, $google_map, $logo, $favicon, $copyright, $description, $keywords, $title, $meta_title, $meta_description, $meta_keywords, $google_analytics, $google_tag_manager, $google_adsense, $google_ads, $facebook_pixel, $facebook_ads, $facebook_pixel_id, $facebook_app_id, $facebook_app_secret, $facebook_page_id, $facebook_page_token, $facebook_page_access_token, $facebook_page_secret;


    public function mount()
    {
        $siteInfo = SiteInfo::first();

        if ($siteInfo) {
            $this->name = $siteInfo->name;
            $this->email = $siteInfo->email;
            $this->phone = $siteInfo->phone;
            $this->address = $siteInfo->address;

            $this->logo = $siteInfo->logo;
            $this->favicon = $siteInfo->favicon;

            $this->facebook = $siteInfo->facebook;
            $this->twitter = $siteInfo->twitter;
            $this->instagram = $siteInfo->instagram;
            $this->linkedin = $siteInfo->linkedin;
            $this->youtube = $siteInfo->youtube;

            $this->google_map = $siteInfo->google_map;
            $this->copyright = $siteInfo->copyright;
            $this->description = $siteInfo->description;
            $this->keywords = $siteInfo->keywords;
            $this->title = $siteInfo->title;
            $this->meta_title = $siteInfo->meta_title;
            $this->meta_description = $siteInfo->meta_description;
            $this->meta_keywords = $siteInfo->meta_keywords;
            $this->google_analytics = $siteInfo->google_analytics;
            $this->google_tag_manager = $siteInfo->google_tag_manager;
            $this->google_adsense = $siteInfo->google_adsense;
            $this->google_ads = $siteInfo->google_ads;
            $this->facebook_pixel = $siteInfo->facebook_pixel;
            $this->facebook_ads = $siteInfo->facebook_ads;
            $this->facebook_pixel_id = $siteInfo->facebook_pixel_id;
            $this->facebook_app_id = $siteInfo->facebook_app_id;
            $this->facebook_app_secret = $siteInfo->facebook_app_secret;
            $this->facebook_page_id = $siteInfo->facebook_page_id;
            $this->facebook_page_token = $siteInfo->facebook_page_token;
            $this->facebook_page_access_token = $siteInfo->facebook_page_access_token;
            $this->facebook_page_secret = $siteInfo->facebook_page_secret;
        }
    }

    /**
     *  this imageUploader method to handle the file uploads
     */
    public function imageUploader($file, $folderName)
    {
        $fileName = $folderName . '-' . Str::random(5) . time() . '.' . $file->extension();
        $file->storeAs($folderName, $fileName, 'public');
        return $fileName;
    }

    /**
     * This deleteImage method handles the deletion of the old image if a new image is provided.
     */
    public function deleteImage($filePath)
    {
        if (Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
            return true;
        }
        return false;
    }

    protected $rules = [

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

    ];

    public function save()
    {
        $this->validate();
        try {

            dump([
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

            $siteInfo = SiteInfo::first();

            $oldLogo = $siteInfo ? $siteInfo->logo : null;
            $oldFavicon = $siteInfo ? $siteInfo->favicon : null;

            // Handle logo upload
            if ($this->logo) {
                if ($oldLogo) {
                    $this->deleteImage('logo/' . $oldLogo);
                }
                $logoFileName = $this->imageUploader($this->logo, 'logo');
            } else {
                $logoFileName = $oldLogo;
            }

            // Handle favicon upload
            if ($this->favicon) {
                if ($oldFavicon) {
                    $this->deleteImage('favicon/' . $oldFavicon);
                }
                $faviconFileName = $this->imageUploader($this->favicon, 'favicon');
            } else {
                $faviconFileName = $oldFavicon;
            }


            SiteInfo::updateOrCreate(['id' => 1], [
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'address' => $this->address,
                'logo' => $logoFileName,
                'favicon' => $faviconFileName,
                'facebook' => $this->facebook,
                'twitter' => $this->twitter,
                'instagram' => $this->instagram,
                'linkedin' => $this->linkedin,
                'youtube' => $this->youtube,
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
                'google_map' => $this->google_map,
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

            return $this->dispatch('toast', message: 'Update Site info component successfully!', notify: 'success');
        } catch (\Throwable $th) {
            Log::error('Save error:', ['error' => $th->getMessage()]);
            return $this->dispatch('toast', message: 'Failed to Update Site info component!', notify: 'error');
        }
    }



    public function render()
    {
        return view('livewire.backend.site.site-info-component');
    }
}
