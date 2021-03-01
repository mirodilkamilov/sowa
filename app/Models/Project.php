<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $casts = [
        'title' => 'array',
        'slug' => 'array',
        'description' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function path()
    {
        return url("/projects/{$this->id}-" . Str::slug($this->slug));
    }
}
