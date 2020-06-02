<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recommend extends Model
{
    //
    protected $table = "recommend";
    protected $primaryKey = "id";
    public $timestamps = false;
}
