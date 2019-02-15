<?php

namespace App;

class Page extends BaseModel
{
    public function owner()
    {
        return $this->belongsTo(User::class);
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
            return route('page.public', $this->slug);
        }

        return '/';
    }

    public function privatePath()
    {
        if ($this->owner_id == 1) {
            return route('page.show', $this->slug);
        }

        return '/';
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
