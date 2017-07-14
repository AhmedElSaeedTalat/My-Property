<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class images extends Model
{
   public $fillable = [
     "images","user_id"
   ];
}
