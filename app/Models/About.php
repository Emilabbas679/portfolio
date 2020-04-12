<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class About extends Model
{
    use HasTranslations;
    protected $table='about';
    protected $fillable = ['img', 'content'];

    public $translatable = ['content'];
}
