@props(['key', 'default' => ''])

{{ \App\Helpers\SettingHelper::get($key, $default) }}
