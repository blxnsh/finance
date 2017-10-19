<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
  public function create()
  {
    return view('registration.create');
   }
  public function store(Request $request)
  {
          $user = User::create(['name' => request('name'),
          'email' => request('email'),
          'password' => bcrypt(request('password'))]);
          auth()->login($user);

    return redirect('/');
}
}
