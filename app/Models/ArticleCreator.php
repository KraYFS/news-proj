<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCreator extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'employees_id'
    ];

    public function employees(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Employees::class, 'id', 'employees_id');
    }

    public function article(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Article::class, 'article_id', 'id');
    }
}
