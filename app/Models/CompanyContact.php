<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyContact extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = ['id'];

    protected $casts = [
        'phone' => 'array',
        'email' => 'array'
    ];

    public function socialMedia()
    {
        return $this->hasMany(SocialMedia::class);
    }
}
