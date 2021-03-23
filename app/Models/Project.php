<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'main_title' => 'array',
        'slug' => 'array',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class)->orderBy('category');
    }

    public function project_contents()
    {
        return $this->hasMany(ProjectContent::class)->orderBy('position');
    }

}
