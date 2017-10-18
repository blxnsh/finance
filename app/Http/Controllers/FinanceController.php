<?php

namespace App\Http\Controllers;

use App\Finance;
use App\Bill;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function index()
    {

      return view('main');
    }

    public function getbill()
    {
      return Bill::getBill();
    }

    public function store(Request $request)
     {
       $this->validate($request, ['name' => 'required',
                               'price' => 'required']);
      $createWaste = Finance::create($request->all());

      Bill::create(['bill' => request('price')]);

      return $createWaste;
     }

     public function show()
      {
        $wastes = Finance::latest()->get();
        return $wastes;
      }

      public function delete(Request $request) {
        Finance::find($request->id)->delete();
        Bill::create(['bill' => $request->price]);
        return "true";
         }

      public function addbill(Request $request)
       {
        $this->validate($request, ['bill' => 'required']);

        $bill = Bill::create($request->only(['bill']));

        return $bill;
       }

}
