<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Team extends Model
{
    use HasTranslations;
    protected $table='team';
    protected $fillable = ['name', 'img', 'content', 'position', 'status'];

    public $translatable = ['content', 'position'];


}
