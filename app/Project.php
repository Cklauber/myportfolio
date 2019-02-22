<?php

namespace App;

class Project extends BaseModel
{
    protected $casts =[
        'is_public' => 'boolean',
        'is_public_repository' => 'bboolean'

    ];
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
        //We are going to find out if this is going to be used by the main/admin user or not
        //So that we can provide the correct route
        if ($this->owner_id == 1) {
            return route('public.project.show', $this->slug);
        } else {
            return route('public.user.project.show', [
                'username' => $this->owner->username,
                'slug' => $this->slug]);
        }
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function complete()
    {
        $this->status = 'completed';
        $this->save();
        return $this;
    }
}
