<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WebsiteSetting;

class WebsiteSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // Basic Information
            'site_name' => 'Inbound Home',
            'tagline' => 'Your Dream Home Awaits',
            'contact_email' => 'info@inboundhome.com',
            'contact_phone' => '+1 555 123 4567',
            'address' => '123 Main Street, City, Country',
            
            // Branding
            'logo' => '',
            'favicon' => '',
            
            // Social Links
            'facebook' => '',
            'twitter' => '',
            'instagram' => '',
            'linkedin' => '',
            
            // SEO
            'meta_title' => 'Inbound Home - Interior and Exterior Finishes',
            'meta_keywords' => 'Interior and Exterior Finishes, home decor, furniture, renovation',
            'meta_description' => 'Transform your space with our professional Interior and Exterior Finishes services. We create beautiful, functional homes that reflect your style.',
            
            // Preferences
            'footer_text' => '© 2025 Inbound Home. All rights reserved.',
            'maintenance_mode' => '0',
        ];

        foreach ($settings as $key => $value) {
            WebsiteSetting::updateOrCreate(
                ['key_name' => $key],
                ['key_value' => $value]
            );
        }
    }
}
