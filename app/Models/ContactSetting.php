<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_title',
        'hero_text',
        'address',
        'phone',
        'email',
        'support_hours',
        'map_iframe',
    ];
}
