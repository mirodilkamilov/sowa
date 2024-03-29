<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class About extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;
    protected $guarded = ['id'];

    protected $casts = [
        'image_title' => 'array',
        'about_title' => 'array',
        'about_description' => 'array',
        'help_title' => 'array',
        'help_description' => 'array',
    ];

    public function aboutLists()
    {
        return $this->hasMany(AboutList::class);
    }

    public function getImageAttribute($value): string
    {
        return '/assets/uploads/' . $value;
    }
}
