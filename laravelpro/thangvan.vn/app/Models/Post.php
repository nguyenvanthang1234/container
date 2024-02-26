<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    //  tao ra de xoa tam thoi
    use SoftDeletes;
//  truong nao can cap nhat du lieu
    protected $fillable=["title","content","user_id","thumbnail"];

    function FeaturedImages(){
        return $this->hasOne("App\Models\FeaturedImages");
    }


    function user(){
        return $this->belongsTo("App\Models\User");
    }
}
