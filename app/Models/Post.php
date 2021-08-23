<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $fillable = ['title', 'excerpt', 'body'];
    protected $guarded = ['id'];

    protected $with = ['category', 'author']; //Defaul Relationship

    public function scopeFilter($query, array $filters)
    {
        // Arrow Function
        $query->when($filters['search'] ?? false, fn ($query, $search) => $query
            ->where('title', 'like', '%' . $search . '%')
            ->orWhere('body', 'like', '%' . $search . '%'));

        // Simple Function
        // $query->when($filters['search'] ?? false, function ($query, $search) {
        //     $query
        //         ->where('title', 'like', '%' . $search . '%')
        //         ->orWhere('body', 'like', '%' . $search . '%');
        // });
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
}
