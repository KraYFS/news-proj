<?php

namespace App\Models;

use App\Models\Translations\LocaleModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speciality extends LocaleModel
{
    use HasFactory;

    protected array $localisable = [
        'name'
    ];

    protected $fillable = [
        'slug',
        'is_active',
        'parent_id'
    ];
}
