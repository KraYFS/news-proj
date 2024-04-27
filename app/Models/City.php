<?php

namespace App\Models;

use App\Models\Translations\LocaleModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends LocaleModel
{
    use HasFactory;

    protected $fillable = [
        'sort',
        'active'
    ];

    protected array $localisable = [
        'name'
    ];
}
