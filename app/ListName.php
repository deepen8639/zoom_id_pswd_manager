<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListName extends Model
{
    protected $fillable = [
      'list_name',
      'userid',
    ];
}
