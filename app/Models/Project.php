<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = ['title'];
    protected $casts = [
        'title' => 'array'
        ];


    public function path()
    {
        return url("/projects/{$this->id}-" . Str::slug($this->slug));
    }


    public function title(){
        switch (app()->getLocale()){
            case 'uz':
                return $this->title['uz'];
                break;
            default:
                return $this->title['ru'];
        }
    }
}
