<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table='posts';
    protected $primarykey='id';

    protected $fillable =[
        'cover',
        'title',
        'description',
        'image',
        'video',
        'users_id',
        'category_id'
    ];

    public function users(){
        return $this -> belongsTo(Users::class);
    }

    public function categories(){
        return $this -> belongsTo(Category::class, 'category_id');
    }

    public function comments(){
        return $this -> hasMany(Comment::class, 'posts_id');
    }
}
