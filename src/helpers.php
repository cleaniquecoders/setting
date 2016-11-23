<?php
use CleaniqueCoders\Setting;
use Illuminate\Support\Facades\Cache;

function setting($key = null, $value = null)
{
    $minutes = 365 * 24 * 60;
    if (!Cache::has('setting')) {
        Cache::put('setting', null, $minutes);
    }

    if (empty($key)) {
        return Cache::get('setting');
    } else {
        if (empty($value)) {
            if (Cache::has('setting.' . $key)) {
                return Cache::get('setting.' . $key);
            }
            return Setting::where('key', $key)->first(); // fallback to database driven
        } else {
            $exist = Setting::where('key', $key)->first();
            if ($exist) {
                $setting = $exist;
            } else {
                $setting = new Setting();
                $setting->key = $key;
            }
            $setting->data = json_encode($value);
            $setting->save();
            Cache::put('setting.' . $key, $setting->toArray(), $minutes);
        }
    }
}
