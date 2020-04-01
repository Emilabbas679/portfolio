<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Process extends Model
{
    protected $table='process';
    use HasTranslations;
    protected $fillable = ['icon', 'title', 'text', 'status'];
    public $translatable = ['text'];

}
