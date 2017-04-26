@extends('layouts.admin')
@section('content')
<div id="content">
    <div id="left">
       @foreach($articles as $article)
       <div id="article">
 <p>
 <h3 ><a href="{{ route('articleShow',['cat'=>$categories->find($article->cat)->alias,'id'=>$article->alias]) }}"> {{$article->title}}</a></h3>
{!!$article->des!!}
<!--<a class="btn btn-default" href="{{ route('artdelete',['id'=>$article->id]) }}" type="submit">Удалить </a></p>-->

<form  style="width: 50px" method="POST" action="{{route('artdelete',['id'=>$article->id])}}">
<button type="submit" class="btn btn-default">Удалить</button>
{{csrf_field()}}      
</form>
  </p>
    
</div> 
       @endforeach   
  
        
    </div>

<div class="spacer"></div>
</div>

@endsection
