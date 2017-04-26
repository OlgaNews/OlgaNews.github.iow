@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <!--   <div class="panel-heading">Dashboard</div>-->

             <!--    <div class="panel-body">-->
                    Ваша регистрация прошла успешно!
                </div>
            </div>
        </div>
    </div>
</div>
<div id="content">

<div id="left">
@foreach($articles as $article)
<p>
<img width="300" aria-hidden="true" alt="" style="top: 0px" src=" {{$article->img}}"/hqdefault.jpg" height="210" align="left" 
  vspace="5" hspace="5">
<h3><a href="{{ route('articleShow',['id'=>$article->id]) }}"> {{$article->title}}</a></h3>
{!!$article->des!!}
<a class="btn btn-default" href="{{ route('articleShow',['id'=>$article->id]) }}" role="button">Подробнее &raquo;</a></p>
@endforeach

</div> <!-- close left -->

<div id="right">

<div id="searchbox">

<p>
     <input type="text" name="T1" style="width:200px;padding:4px;" /><br />
     <input type="submit" value="Search" name="B1" style="width: 210px;padding:4px;" />
 </p>

</div> <!-- close searchbox -->

<p>
     Vivamus orci elit, luctus eu, tempus at, <a href="#">suscipit at</a>, purus. 
     Praesent euismod. Aenean <a href="#">vitae</a> odio. Sed nec erat non 
     nunc viverra fringilla. Mauris mauris metus, varius sit amet, semper et, 
     eleifend eu, leo. Phasellus sodales. <a href="#">Etiam massa purus</a>, 
     placerat et, dapibus ac, malesuada et, lacus. Mauris congue ornare ante. 
     Suspendisse potenti. Maecenas mi libero, auctor nec, congue sit amet, 
     consequat sed, est. In sit amet risus quis sem hendrerit rhoncus. Curabitur 
     <a href="#">convallis tellus et mauris</a>. 
</p>

<ul>
<li><a href="http://acvarif.net.ru">Link Item</a></li>
<li><a href="http://acvarif.net.ru">Link Item</a></li>
<li><a href="http://acvarif.net.ru">Link Item</a></li>
</ul>

<h4>Column Title</h4>

<p>
     Vivamus orci elit, luctus eu, tempus at, <a href="#">suscipit at</a>, purus. 
     Praesent euismod. Aenean <a href="#">vitae</a> odio. Sed nec erat non 
     nunc viverra fringilla. Mauris mauris metus, varius sit amet, semper et, 
     eleifend eu, leo. Phasellus sodales. <a href="#">Etiam massa purus</a>, 
     placerat et, dapibus ac, malesuada et, lacus. Mauris congue ornare ante. 
     Suspendisse potenti. Maecenas mi libero, auctor nec, congue sit amet, 
     consequat sed, est. In sit amet risus quis sem hendrerit rhoncus. Curabitur 
     <a href="#">convallis tellus et mauris</a>. 
</p>

</div> <!-- close right -->

<div class="spacer"></div>

</div> <!-- close content -->
@endsection

