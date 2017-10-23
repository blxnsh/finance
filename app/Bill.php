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
      $wastes = User::find(Auth::user()->id)->finances()->get();
      $bill = 0;
      foreach ($bills as $oneBill) {
        $bill = $bill + $oneBill->bill;
      }
      foreach ($wastes as $oneWaste) {
        $bill = $bill + $oneWaste->price;
      }
      return $bill;
    }

    public function users(){
    return  $this->belongsTo(User::class);
    }
}
