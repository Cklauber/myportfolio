<?php

namespace App;

class Project extends BaseModel
{
    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function privatePath()
    {
        return route('admin.project.show', $this->slug);
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
