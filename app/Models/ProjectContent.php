<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectContent extends Model
{
//    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;
    protected $guarded = ['id'];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'image' => 'array',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
