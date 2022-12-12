<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class post extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'body'=>['required','string','max:255']
    );
    use softDeletes;

}
