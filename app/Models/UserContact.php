<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'message',
    ];

    protected $attributes = [
        'status' => 'not reviewed',
    ];
}
