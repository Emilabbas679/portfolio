<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Partner extends Model
{
    use HasTranslations;
    protected $table='partners';
    protected $fillable = ['title', 'img', 'about', 'status'];

    public $translatable = ['title', 'about'];
}
