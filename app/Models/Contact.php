<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table='contact';
    protected $fillable = ['name', 'email', 'phone', 'message', 'is_read'];
}
