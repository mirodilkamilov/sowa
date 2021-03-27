<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyDetail extends Model
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

    public function companyLists()
    {
        return $this->hasMany(CompanyList::class);
    }
}
