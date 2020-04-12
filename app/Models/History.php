<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class History extends Model
{
    use HasTranslations;
    protected $table='history';
    protected $fillable = ['img', 'content','date'];

    public $translatable = ['content'];
}
