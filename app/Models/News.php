<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class News extends Model
{
    use HasTranslations;
    use HasSlug;

    protected $table='news';
    protected $fillable = ['title', 'content', 'slug', 'comments', 'views', 'likes', 'img','created_by', 'updated_by','status'];
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->usingLanguage('az');
    }

    public $translatable = ['title', 'content'];


    public function createdby()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }
    public function updatedby()
    {
        return $this->hasOne(User::class, 'id', 'updated_by');
    }

}
