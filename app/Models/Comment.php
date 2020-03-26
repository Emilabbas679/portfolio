<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table='comments';
    protected $fillable=['user_id', 'news_id', 'comment'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function news()
    {
        return $this->hasOne(News::class, 'id', 'news_id');
    }
}
