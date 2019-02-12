<?php

namespace App;

use Illuminate\Support\Facades\Auth;

class Page extends BaseModel
{
    public function owner()
    {
        return $this->belongsTo('App\User');
    }

    public function post()
    {
        $this['status'] = 'posted';

        $this->update();

        return $this;
    }

    public function publicPath()
    {
        if ($this->owner_id == 1) {

            return route('public.page.show', $this->slug);

        }

        return '/';
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
