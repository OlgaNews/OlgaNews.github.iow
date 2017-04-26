<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\IndexController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';
    protected $h1;
    protected $m;
    protected $m2;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
        $this->h1='Актуальные новости';
	$this->m='Мудрость приходит вместе со способностью быть спокойным. Просто СМОТРИ и СЛУШАЙ. Больше ничего не нужно.';
	$this->m2='У нас один рот и два уха, значит мы должны больше слушать, чем говорить. Но пара глаз расположена выше ушей, поэтому мы должны видеть, а не верить слухам. Над всем этим есть мозг, поэтому мы обязаны сначала думать, прежде чем увидев отрывок услышав слухи, выливать все через рот.';

    }
}
