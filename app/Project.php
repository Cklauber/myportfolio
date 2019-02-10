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
        if ($this->is_public == true) {
            if ($this->owner_id == 1) {
                return route('public.project.show/', $this->slug);
            } else {
                return route('public.user.project.show', [
                    'username' => $this->owner->username,
                    'slug' => $this->slug]);
            }
        } else {
            return abort(403, 'Unauthhorized.');
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
