<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // // protected $fillable = ['title', 'excerpt', 'body'];
    // protected $guarded = ['id'];

    protected $with = ['category', 'author']; //Defaul Relationship

    public function scopeFilter($query, array $filters)
    {
        // Search Post by title and body
        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) => $query
                ->where(fn ($query) =>
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%'))
        );

        // Category Filter
        $query->when(
            $filters['category'] ?? false,
            fn ($query, $category) => $query
                ->whereHas(
                    'category',
                    fn ($query) =>
                    $query->where('slug', $category)
                )
        );

        // Author Filter
        $query->when(
            $filters['author'] ?? false,
            fn ($query, $author) => $query
                ->whereHas(
                    'author',
                    fn ($query) =>
                    $query->where('username', $author)
                )
        );
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
