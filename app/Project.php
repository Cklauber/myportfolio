<?php

namespace App;

use Illuminate\Foundation\Auth\User;

class Project extends BaseModel
{
    public function created_by()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function privatePath()
    {
        return route('admin.portfolio.show', $this->slug);
    }

    public function publicPath()
    {
        return "/portfolio/{$this->slug}";
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
