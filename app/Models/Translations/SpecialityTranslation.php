<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialityTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'language_id',
        'speciality_id'
    ];
}
