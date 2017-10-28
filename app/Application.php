<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'application';

    /**
     * Get the phone record associated with the user.
     */
    public function response()
    {
        return $this->hasOne('App\Response');
    }

    /**
     * Get the post that owns the comment.
     */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

}
