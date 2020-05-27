<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZoomIdPswd extends Model
{
    protected $fillable = [
      'id',
      'userid',
      'list_name',
      'zoom_id',
      'zoom_pswd',
      // 'zoom_date',
    ];
}
