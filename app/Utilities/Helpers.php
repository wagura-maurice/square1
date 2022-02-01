<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Route;

if (! function_exists('checkRoute')) {
    /**
     * @param $route
     * @return bool
     */
    function checkRoute($route): bool
    {
        // check if passed route name is current!
        if ($route == Route::currentRouteName()) {

            // check if passed route exists on route's list
            /* if ($route[0] === "/") {
                $route = substr($route, 1);
            }
    
            $routes = Route::getRoutes()->getRoutes();
            
            foreach ($routes as $r) {
                if ($r->action['as'] == $route) {
                    return true;
                }
            } */
            
            return true;
        }

        return false;
    }
}

if (! function_exists('updateSetting')) {
    /**
     * get value of individual app settings.
     *
     * @param  string  $item
     *
     * @return bool
     */
    function updateSetting(string $item, string $data): bool
    {
        $setting = Setting::whereItem($item)->firstOrFail();

        return $setting->update([
            'current_value' => $data
        ]);
    }
}

if (! function_exists('getSetting')) {
    /**
     * get value of general app settings.
     *
     * @param  string  $item
     *
     * @return string
     */
    function getSetting(string $item): string
    {
        $setting = Setting::whereItem($item)->firstOrFail();

        return optional($setting)->current_value ?? $setting->default_value;
    }
}
