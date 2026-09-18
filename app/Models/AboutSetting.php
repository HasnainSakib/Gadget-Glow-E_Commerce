<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_title',
        'hero_subtitle',
        'hero_image',
        'story_title',
        'story_content',
        'mission',
        'vision',
        'stat_1_number',
        'stat_1_label',
        'stat_2_number',
        'stat_2_label',
        'stat_3_number',
        'stat_3_label',
        'stat_4_number',
        'stat_4_label',
    ];
}
