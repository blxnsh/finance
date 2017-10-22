<?php

namespace App;

use Auth;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $guarded = [];

    public static function getBill(){
      $bills = User::find(Auth::user()->id)->bills()->get();
      $bill = 0;
      foreach ($bills as $oneBill) {
        $bill = $bill + $oneBill->bill;
      }
      return $bill;
    }

    public function users(){
    return  $this->belongsTo(User::class);
    }
}
