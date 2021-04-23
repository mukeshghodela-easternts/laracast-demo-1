<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{
    public static function find($slug)
    {
        $path = resource_path("posts/{$slug}.html");

        if (!file_exists($path)) {
            throw new ModelNotFoundException();
        }

        return cache()->remember("posts.{$slug}", now()->addMinutes(20), function () use ($path) {
            var_dump('file_get_contents');
            return file_get_contents($path);
        });
    }
    public static function findAll()
    {
        $files =  File::files(resource_path("posts/"));

        return array_map(fn ($file) => $file->getContents(), $files);
    }
}
