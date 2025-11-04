<?php

namespace App\Helpers;

use App\Models\WebsiteSetting;

class SettingHelper
{
    /**
     * Get a setting value by key
     */
    public static function get($key, $default = null)
    {
        return WebsiteSetting::getValue($key, $default);
    }

    /**
     * Set a setting value by key
     */
    public static function set($key, $value)
    {
        return WebsiteSetting::setValue($key, $value);
    }

    /**
     * Get all settings as an array
     */
    public static function all()
    {
        return WebsiteSetting::getAllSettings();
    }

    /**
     * Get site name
     */
    public static function siteName()
    {
        return self::get('site_name', 'Inbound Home');
    }

    /**
     * Get site tagline
     */
    public static function tagline()
    {
        return self::get('tagline', 'Your Dream Home Awaits');
    }

    /**
     * Get contact email
     */
    public static function contactEmail()
    {
        return self::get('contact_email', 'info@inboundhome.com');
    }

    /**
     * Get contact phone
     */
    public static function contactPhone()
    {
        return self::get('contact_phone', '+1 555 123 4567');
    }

    /**
     * Get address
     */
    public static function address()
    {
        return self::get('address', '123 Main Street, City, Country');
    }

    /**
     * Get logo URL
     */
    public static function logo()
    {
        $logo = self::get('logo');
        return $logo ? asset('storage/' . $logo) : null;
    }

    /**
     * Get favicon URL
     */
    public static function favicon()
    {
        $favicon = self::get('favicon');
        return $favicon ? asset('storage/' . $favicon) : null;
    }

    /**
     * Get social links
     */
    public static function socialLinks()
    {
        return [
            'facebook' => self::get('facebook'),
            'twitter' => self::get('twitter'),
            'instagram' => self::get('instagram'),
            'linkedin' => self::get('linkedin'),
        ];
    }

    /**
     * Get SEO settings
     */
    public static function seo()
    {
        return [
            'meta_title' => self::get('meta_title'),
            'meta_keywords' => self::get('meta_keywords'),
            'meta_description' => self::get('meta_description'),
        ];
    }

    /**
     * Check if maintenance mode is enabled
     */
    public static function isMaintenanceMode()
    {
        return self::get('maintenance_mode', '0') === '1';
    }
}
