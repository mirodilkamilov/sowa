<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectContent extends Model
{
    use HasFactory;
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

    public function getImagePath(): array|string|null
    {
        switch ($this->type) {
            case 'image-small':
            case 'image-big':
                return '/assets/uploads/' . $this->image['image'];
            case 'slide':
                $slides = array();
                foreach ($this->image['slide'] as $img) {
                    $slides[] = '/assets/uploads/' . $img;
                }
                return $slides;
        }
        return null;
    }
}
