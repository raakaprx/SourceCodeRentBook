<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\categories;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Book extends Model
{
    use Sluggable; // Correct trait name
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'book_code', 'title', 'cover', 'categories', 'slug'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * The roles that belong to the book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    // public function roles(): BelongsToMany
    // {
    //     return $this->belongsToMany(categories::class, 'book_category', 'book_id', 'category_id');
    // }
    public function categories()
    {
        return $this->belongsToMany(Categories::class);
    }
}