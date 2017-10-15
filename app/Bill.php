<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $guarded = [];

    public static function getBill(){
      $bills = Bill::all();
      $bill = 0;
      foreach ($bills as $oneBill) {
        $bill = $bill + $oneBill->bill;
      }
      return $bill;
    }
}