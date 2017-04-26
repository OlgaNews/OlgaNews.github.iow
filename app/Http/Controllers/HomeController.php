<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Article;
use App\Http\Controllers\Auth\RegisterController;

class HomeController extends Controller
{
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
        $this->middleware('auth');
        $this->h1='Актуальные новости';
	$this->m='Мудрость приходит вместе со способностью быть спокойным. Просто СМОТРИ и СЛУШАЙ. Больше ничего не нужно.';
	//$this->m2='У нас один рот и два уха, значит мы должны больше слушать, чем говорить. Но пара глаз расположена выше ушей, поэтому мы должны видеть, а не верить слухам. Над всем этим есть мозг, поэтому мы обязаны сначала думать, прежде чем увидев отрывок услышав слухи, выливать все через рот.';
      /*  if (Auth::check()) $this->m2="Вы успешно авторизированы";
        else $this->m2="Вы не авторизированы";*/
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $articles=Article::select('id','title','des','img')->get();
        return view('home')->with(['h1'=>$this->h1,'m'=>$this->m,'m2'=>$this->m2,'articles'=>$articles]);
    }
}
