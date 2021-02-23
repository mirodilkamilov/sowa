<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['title', 'category'];

    public function path()
    {
        return url("/projects/{$this->id}-" . Str::slug($this->slug));
    }
}
