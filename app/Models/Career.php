<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Career extends Model
{
    use HasTranslations;
    protected $table='careers';
    protected $fillable = ['position', 'about', 'requirements', 'offers', 'status'];
    public $translatable = ['position', 'about', 'requirements', 'offers'];

}
