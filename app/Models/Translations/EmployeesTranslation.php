<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeesTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'employees_id',
        'description',
        'language_id',
        'first_name',
        'last_name',
        'surname'
    ];
}
