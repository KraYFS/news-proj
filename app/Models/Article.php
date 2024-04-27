<?php

namespace App\Models;

use App\Models\Translations\ArticleTranslation;
use App\Models\Translations\LocaleModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

/**
 * @property ArticleTranslation $translations
 */

class Article  extends LocaleModel
{
    use HasFactory;
    protected $fillable = [
        'photo_id',
        'is_active',
        'created_at',
        'public_at',
        'slug',
        'views',
        'resource'
    ];
    protected array $localisable = [
        'name',
        'text'
    ];

    public function creators(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ArticleCreator::class, 'article_id', 'id');
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
        return asset('img/article.png');
    }
}
