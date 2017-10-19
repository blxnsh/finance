<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
      protected $guarded = [];

      public function users() {
        return  $this->belongsTo(User::class);
      }
}
