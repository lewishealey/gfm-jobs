<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'response';

    /**
     * Get the phone record associated with the user.
     */
    public function applications()
    {
        return $this->hasOne('App\Application');
    }

}
