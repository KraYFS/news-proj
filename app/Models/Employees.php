<?php

namespace App\Models;

use App\Models\Translations\LocaleModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

class Employees extends LocaleModel
{
    use HasFactory;

    protected array $localisable = [
        'last_name',
        'first_name',
        'surname',
        'description',
    ];

    protected $fillable = [
        'photo_id',
        'speciality_id',
        'status'
    ];

    public function speciality(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Speciality::class, 'id', 'speciality_id');
    }


    public function creator(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ArticleCreator::class, 'employees_id', 'id');
    }

    public function file(): HasOne
    {
        return $this->hasOne(File::class, 'id', 'photo_id');
    }

    public function getPhotoAttribute(): string
    {
        if (!is_null($this->photo_id) && Storage::disk($this->file->disk)->exists($this->file->name)) {
            return Storage::disk($this->file->disk)->url($this->file->name);
        }
        return asset('img/aut48_1.png');
    }
}
