<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Game extends Model
{
    protected $fillable = [
        'name',
        'date_de_sortie',
        'content',
    ];
    use HasFactory;

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

}
