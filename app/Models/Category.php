<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    protected $fillable = [
        'name',
        'game_id'
    ];
    
    use HasFactory;



public function games(): BelongsTo
{
    return $this->belongsTo(Game::class);
}
}
