<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = array('id');

    public function getData()
    {
        return $this->id. ": this is :" . $this->message;
    }
}
