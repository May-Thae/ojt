<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['title','description','create_user_id', 'updated_user_id'];

    public function user(){
        // return $this->belongsTo(User::class, 'create_user_id');
        return $this->belongsTo('App\User', 'create_user_id');
    }
}
