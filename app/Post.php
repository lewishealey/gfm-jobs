<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'post';


    /**
     * Get the comments for the blog post.
     */
    public function applications()
    {
        return $this->hasMany('App\Application');
    }
}
