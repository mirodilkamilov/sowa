<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Psy\Util\Str;

class Project extends Model
{
    use HasFactory;

    public function path()
    {
        return url("/projects/{$this->id}-" . Str::slug($this->title));
    }

//    public function getRouteKeyName()
//    {
//        return 'slug';
//    }
}
