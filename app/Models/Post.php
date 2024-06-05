<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'author',
        'category_id'
    ];

    /**
     * define post relationship with category
     * @return BelongsTo
     * @author MARIANI Matthieu <dev.marianimatthieu@gmail.com>
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * define post relationship with tag
     * @return BelongsToMany
     * @author MARIANI Matthieu <dev.marianimatthieu@gmail.com>
     */
    public function tags (): BelongsToMany {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * parse post content in markdown
     * @param $value
     * @return string
     * @author MARIANI Matthieu <dev.marianimatthieu@gmail.com>
     */
    public function markdown($value): string
    {
        return Str::of($value)->markdown();
    }
}
