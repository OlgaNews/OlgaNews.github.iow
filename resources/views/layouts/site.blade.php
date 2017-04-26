<!DOCTYPE html>
<html>
<head>

<meta name="keywords" content="новости, события, политика, культура, спорт" />
<meta name="description" content="Новости" />
<meta charset="UTF-8">
<!--********************************-->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 
 <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
 <!--*******************-->
<style type="text/css" media="all"> @import "{{asset('css/style.css')}}";</style>
    
<title></title>
<script src='https://www.google.com/recaptcha/api.js'></script>    
</head>    
<body>

<div id="page">
<div id="page_padding">

<div id="header">
<div id="header_left">
<h1><a href="#">{{$h1}}</a></h1>
<br>
<h2>{{$m}}</h2> 

</div> <!-- close header_left -->
</div> <!-- close header -->

<div id="menu">

<div id="navcontainer">
<ul id="navlist">
<li id="active"><a href="{{ route('page') }}" id="current">Главная</a></li>
<li><a href="{{ route('category')}}">Рубрики </a></li>
<li><a href="{{ route('tag')}}">Тэги </a></li>
<li><a href="{{ route('about')}}">О проекте</a></li>
<li><a href="{{ route('contact')}}">Контакты</a></li>
</ul>
</div> <!-- close navcontainer -->
</div> <!-- close menu -->

<div id="Registration">
<p>
    <!-- Authentication Links -->
    @if (Auth::guest()) 
    <a href="{{ route('register') }}">Регистрация</a> » <a href="{{ route('login') }}">Авторизация</a> 
<h4> Вы не авторизированы <h4>    
    @else
    <div id="right">
    <br>
   <li class="dropdown">
                  <!--              <a href="{{ route('Person') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a> -->
       <a href="{{ route('Person') }}" class="dropdown-toggle" role="button" >
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
       
   </li>
                               
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Выход
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                
                            
                           </div> 
                        @endif

</p>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</div> <!-- close Registration -->
@if(count($errors)>0)
<div class="alert alert-danger">
<ul>
@foreach($errors->all() as $error)
<li>{{$error}} </li>
@endforeach
</ul>
</div>
@endif
@yield('content')

<div id="footer">
<p>
     Template courtesy of <a title="Designs By Darren - Free CSS Web Design Templates" href="http://www.designsbydarren.com">Designs By Darren</a><br />
      <a title="Valid XHTML 1.0 Strict" href="http://validator.w3.org/check?uri=referer">Valid XHTML 1.0 Strict</a>,  <a title="Valid CSS" href="http://jigsaw.w3.org/css-validator/validator?uri=http://www.designsbydarren.com/demos/morning_news/css/style.css">Valid CSS</a>
</p> <!-- close footer -->
</div>

</div> <!-- close page_padding -->
</div> <!-- close page -->

</body>

</html>
