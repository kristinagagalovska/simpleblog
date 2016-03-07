<?php

use Illuminate\Database\Eloquent\Model;

class Comments extends Model {

    protected  $quarded=[];

    //userot koj komentirashe
    public function author(){
        return $this->belongsTo('App\User','from_user');
    }

    //postot na koj se komentirashe
    public function post() {
        return $this->belongsTo('App\Post','on_post');
    }


}