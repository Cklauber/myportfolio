<?php

namespace App\Http\Validation;

use Illuminate\Contracts\Validation\Rule;
use App\Page;

class PageSlug implements Rule
{
    /**
     * This will test if our slug is valid or not
     * By checking if there is a route or another
     * slug with the samme value
     */
    public function passes($attribute, $value)
    {

        $uris = collect(\Route::getRoutes())
        ->map(function ($route) {
            //getting only the first portion of the URI
            return explode('/', $route->uri)[0];
        })
        ->filter(function ($values) {
            //Removing blanks and }
            return $values != null && !strpos($values, '}');
        })
        ->unique();
        
        return !$uris->contains($value);
    }

    public function message()
    {
        return 'Slug already in use. Please, try another one.';
    }
}
