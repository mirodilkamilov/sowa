<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slide extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;
    protected $guarded = ['id'];

    protected $casts = [
        'title' => 'array',
        'sub_title' => 'array',
        'description' => 'array',
    ];

    public function getImageAttribute($value): string
    {
        return '/assets/uploads/' . $value;
    }

    public function getCategoryIdAttribute($value): string
    {
        return $value ?? 'all';

    }
}
