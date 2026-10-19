<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    protected $fillable = [
        'hero_label',
        'hero_title',
        'hero_description',
        'hero_image',
        'story_label',
        'story_title',
        'story_content',
        'values_label',
        'values_title',
        'values_description',
        'value1_title',
        'value1_content',
        'value2_title',
        'value2_content',
        'value3_title',
        'value3_content',
        'section_image',
        'info1_label',
        'info1_value',
        'info2_label',
        'info2_value',
        'info3_label',
        'info3_value',
        'info4_label',
        'info4_value',
    ];
}
