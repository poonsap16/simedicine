<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Callback extends Model
{
    protected $fillable = [
        'username','text','reply_code'
    ]; 
}
