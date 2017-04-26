<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    	protected $h1;
	protected $m;
	protected $m2;
        protected $z;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->h1='Актуальные новости';
	$this->m='Мудрость приходит вместе со способностью быть спокойным. Просто СМОТРИ и СЛУШАЙ. Больше ничего не нужно.';
	$this->m2='У нас один рот и два уха, значит мы должны больше слушать, чем говорить. Но пара глаз расположена выше ушей, поэтому мы должны видеть, а не верить слухам. Над всем этим есть мозг, поэтому мы обязаны сначала думать, прежде чем увидев отрывок услышав слухи, выливать все через рот.';
        $this->z='Мудрость приходит вместе со способностью быть спокойным. Просто СМОТРИ и СЛУШАЙ. Больше ничего не нужно.';
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
