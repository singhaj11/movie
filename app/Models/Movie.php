<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'release_date',
        'status',
        'image',
        'description'
    ];

    /**
     * Interact with the movie title.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function slug(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => $this->generateUniqueSlug($value),
        );
    }

    private function generateUniqueSlug($value)
    {
        $slug = \Str::slug($value);
        while ($this->where('slug', $slug)->exists()) {
            $slug = $slug .  '-' . rand(1, 1000);
        }
        return $slug;
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($movie) {
            if (!empty($movie->image)) {
                removeImage('/uploads/movies', $movie->image);
            }
        });
    }

    public function scopePublished($query)
    {
        return $query->where('status', true);
    }

    public function favourites()
    {
        return $this->morphMany(Favourite::class, 'favouriteable');
    }
}
