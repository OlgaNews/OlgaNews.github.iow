
@extends('layouts.site')
@section('content')
<div id="content">

<div id="left">
@if($article)
<p>
<img width="300" aria-hidden="true" alt="" style="top: 0px" src=" {{$article->img}}"/hqdefault.jpg" height="210" align="left" 
  vspace="5" hspace="5">
<h2><a href="#"> {{$article->title}}</a></h2>
<font size="4" color="black" face="Arial">{!!$article->text!!}</font>
</p>
<p><h4>Дата публикации: </h4>{{$article->updated_at}}</p>
<p><h4>Источник:</h4><a href="{{$article->source}}"> {{$article->source}}</a></p>
@endif
<p> <h3>Коментарии: </h3> </p>
<form  action="{{route('addComment',['id'=>$article->id])}}">
<button type="submit" class="btn btn-default">Добавить коментарий</button>
{{csrf_field()}}
</form>   
@foreach($comment_us as $comment)
<div id="comment">
<p>{{$comment->user()->value('name')}}  </p>
<p> {{$comment->text}} </p>
<p> {{$comment->created_at}} </p>
<hr>
</div> <!-- close comment -->
@endforeach

</div> <!-- close left -->

<div id="right">

<div id="searchbox">

<p>
     <input type="text" name="T1" style="width:200px;padding:4px;" /><br />
     <input type="submit" value="Search" name="B1" style="width:200px;padding:4px;" />
 </p>

</div> <!-- close searchbox -->

{!!$m2!!}
</div> <!-- close right -->

<div class="spacer"></div>

</div> <!-- close content -->
@endsection

