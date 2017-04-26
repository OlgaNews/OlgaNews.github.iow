
@extends('layouts.site')
@section('content')
<div id="content">

<div id="left">
@foreach($articles as $article)
<p>
<img width="300" aria-hidden="true" alt="" style="top: 0px" src=" {{$article->img}}"/hqdefault.jpg" height="210" align="left" 
  vspace="5" hspace="5">
<h3><a href="{{ route('articleShow',['cat'=>$categories->find($article->cat)->alias,'id'=>$article->alias]) }}"> {{$article->title}}</a></h3>
<font size="4" color="black" face="Arial">{!!$article->des!!}</font>
<a class="btn btn-default" href="{{ route('articleShow',['cat'=>$categories->find($article->cat)->alias,'id'=>$article->alias]) }}" role="button">Подробнее &raquo;</a></p>
@endforeach
<br> Страницы:
<ul id="navlist">
@for($i=1;$i<=$count_page;$i++)
@if($i==$np) <li id="active"><a href="{{ route('page',['np'=>$i]) }}" id="current">{{$i}}</a></li>
@else <li><a href="{{ route('page',['np'=>$i]) }}">{{$i}}</a></li>
@endif
@endfor
</ul>
</div> <!-- close left -->

<div id="right">

<div id="searchbox">

<p>
     <input type="text" name="T1" style="width:200px;padding:4px;" /><br />
     <input type="submit" value="Search" name="B1" style="width: 210px;padding:4px;" />
 </p>

</div> <!-- close searchbox -->

{!!$m2!!}
</div> <!-- close right -->

<div class="spacer"></div>

</div> <!-- close content -->
@endsection

