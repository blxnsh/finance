<?php

namespace App\Http\Controllers;

use App\Finance;
use App\Bill;
use App\User;
use Illuminate\Http\Request;
use Auth;

class FinanceController extends Controller
{
    public function index()
    {
      if(Auth::user())
      {return view('main');}
      else
      {return view('home');}
    }

    public function getbill()
    {
      return Bill::getBill();
    }

    public function store(Request $request)
     {
       $this->validate($request, ['name' => 'required',
                               'price' => 'required']);
      $id = Auth::user()->id;
      $createWaste = Finance::create([
        'name' => request('name'),
        'price' => request('price'),
        'description' => request('description'),
        'user_id' => $id]
      );

      Bill::create(['bill' => request('price'),'user_id' => $id]);

      return $createWaste;
     }

     public function show()
      {
        $wastes = User::find(Auth::user()->id)->finances()->latest()->get();
        return $wastes;
      }

      public function delete(Request $request) {
        Finance::find($request->id)->delete();
        $id = Auth::user()->id;
        Bill::create(['bill' => $request->price,
                      'user_id' => $id]);
        return "true";
         }

      public function addbill(Request $request)
       {
        $this->validate($request, ['bill' => 'required']);
        $id = Auth::user()->id;
        $bill = Bill::create(['bill' => request('bill'),
                              'user_id' => $id]);

        return $bill;
       }

}
