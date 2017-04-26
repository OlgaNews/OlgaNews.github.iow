<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
   * Показать профиль данного пользователя.
   *
   * @param  Request  $request
   * @param  int  $id
   * @return Response
   */
  public function showProfile(Request $request)
  {
   
// $value = $request->session()->all();
      $value = $request->session()->all();
    $value_a=array_values($value);
dump($value_a);
    //
  }
    //
}
