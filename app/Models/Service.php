<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    protected $table='services';
    use HasTranslations;
    protected $fillable = ['icon', 'title', 'text', 'status'];
    public $translatable = ['text'];
}
