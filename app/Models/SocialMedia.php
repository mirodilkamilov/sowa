<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = 'name';
    protected $keyType = 'string';

    protected $fillable = ['name', 'url'];
}
