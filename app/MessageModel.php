<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageModel extends Model
{
    protected $table = 'messages';

    public $timestamps = true;

    protected $guarded = [];

}
