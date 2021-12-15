<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\ModelNotFoundException; 

class Post extends Model
{
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct ($title, $excerpt, $date, $body, $slug) {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function allPosts() 
    {

        return cache()->rememberForever('posts.allPosts', function () {
            //get all the post from directory
            return collect(File::files(resource_path("posts")))
            ->map(fn($file) => YamlFrontMatter::parseFile($file))
            ->map(fn($document) => New Post(
                $document->title,
                $document->excerpt,
                $document->date,
                $document->body(),
                $document->slug,
                ))
                ->sortByDesc('date'); 
        });
    }
    
    public static function find($slug) {
        //try to find first
        return static::allPosts()->firstWhere('slug', $slug);
    }

    public static function findorFail($slug) {
        //try to find first
        $post = static::allPosts()->firstWhere('slug', $slug);
        if (! $post) {
            throw new ModelNotFoundException();
        }
        return $post;
    }

}
