<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bbs extends Model
{
    //
    protected $table = "bbs_user";
    protected $primaryKey = "id";
    public $timestamps = true;
}
