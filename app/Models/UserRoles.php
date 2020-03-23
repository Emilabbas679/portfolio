<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserRoles extends Model
{
    protected $table = 'model_has_roles';
    protected $fillable = ['role_id', 'model_id', 'model_type'];
    protected $primaryKey='model_id';
    public $timestamps=false;
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'model_id');
    }


    public function role()
    {
        return $this->hasOne(Roles::class, 'id', 'role_id');
    }
}
