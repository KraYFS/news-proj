<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

class PressRequest extends Model
{
    use HasFactory;

    protected  $fillable = [
        'phone',
        'status',
        'photo_id',
        'email',
        'car',
        'car_number',
        'car_brand',
        'city',
        'surname',
        'last_name',
        'first_name',
        'term',
        'speciality_id',
        'apartment',
        'house',
        'region',
        'steer',
        'delivery_addresses_city',
        'delivery_addresses_department'
    ];

    public function special(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Speciality::class, 'speciality_id');
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
        return false;
    }
}
