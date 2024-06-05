<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    /**
     * define category relationship with post
     * @return HasMany
     * @author MARIANI Matthieu <dev.marianimatthieu@gmail.com>
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
