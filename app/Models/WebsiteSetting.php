<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    protected $fillable = [
        'key_name',
        'key_value'
    ];

    /**
     * Get setting value by key name
     */
    public static function getValue($key, $default = null)
    {
        $setting = static::where('key_name', $key)->first();
        return $setting ? $setting->key_value : $default;
    }

    /**
     * Set setting value by key name
     */
    public static function setValue($key, $value)
    {
        return static::updateOrCreate(
            ['key_name' => $key],
            ['key_value' => $value]
        );
    }

    /**
     * Get all settings as key-value array
     */
    public static function getAllSettings()
    {
        return static::pluck('key_value', 'key_name')->toArray();
    }
}
