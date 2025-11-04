<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class WebsiteSettingsController extends Controller
{
    public function index()
    {
        $settings = WebsiteSetting::getAllSettings();
        return view('backend.pages.website-settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'site_name' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:255',
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:500',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'favicon' => 'nullable|image|mimes:ico,png,jpg|max:1024',
            'facebook' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:500',
            'meta_description' => 'nullable|string|max:500',
            'footer_text' => 'nullable|string|max:255',
            'maintenance_mode' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Handle file uploads
            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('settings', 'public');
                WebsiteSetting::setValue('logo', $logoPath);
            }

            if ($request->hasFile('favicon')) {
                $faviconPath = $request->file('favicon')->store('settings', 'public');
                WebsiteSetting::setValue('favicon', $faviconPath);
            }

            // Update text settings
            $textSettings = [
                'site_name', 'tagline', 'contact_email', 'contact_phone', 'address',
                'facebook', 'twitter', 'instagram', 'linkedin',
                'meta_title', 'meta_keywords', 'meta_description', 'footer_text'
            ];

            foreach ($textSettings as $setting) {
                if ($request->has($setting)) {
                    WebsiteSetting::setValue($setting, $request->input($setting));
                }
            }

            // Handle maintenance mode checkbox
            $maintenanceMode = $request->has('maintenance_mode') ? '1' : '0';
            WebsiteSetting::setValue('maintenance_mode', $maintenanceMode);

            return redirect()->route('website-settings')
                ->with('success', 'Website settings updated successfully!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to update settings: ' . $e->getMessage())
                ->withInput();
        }
    }
}
