<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

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
        return $this->belongsToMany(Category::class);
    }

    public function project_contents()
    {
        return $this->hasMany(ProjectContent::class)->orderBy('position');
    }

    public function getMainImageAttribute($value): string
    {
        return '/assets/uploads/' . $value;
    }
}
