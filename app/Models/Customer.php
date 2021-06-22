<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['position', 'name', 'logo'];

    public function getLogoAttribute($value): string
    {
        return '/assets/uploads/' . $value;
    }
}
