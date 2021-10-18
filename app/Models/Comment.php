<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable =[
        'comments',
        'posts_id',
        'users_id'
    ];
    use HasFactory;

    public function posts(){
        return $this -> belongsTo(Post::class, 'posts_id');
    }

    public function users(){
        return $this -> belongsTo(User::class, 'users_id');
    }
}
