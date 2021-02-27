<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $casts = [
        'title' => 'array',
        'slug' => 'array',
    ];

    public function path()
    {
        return url("/projects/{$this->id}-" . Str::slug($this->slug));
    }
}
