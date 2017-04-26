@extends('layouts.site')
@section('content')
<div id="content">

<div id="left">
   @if($article)
<p>
<img width="300" aria-hidden="true" alt="" style="top: 0px" src=" {{$article->img}}"/hqdefault.jpg" height="210" align="left" 
  vspace="5" hspace="5">
<h3><a href="#"> {{$article->title}}</a></h3>
{!!$article->text!!}
</p>
<p><h4>Источник:<h4><a href="{{$article->source}}"> {{$article->source}}</a></p>


        <div class="form">
	<form method="POST" action="{{route('commentStore',['newsid'=>$article->id,'id_u'=> Auth::user()->id])}}">	
	<div class="form-group">	
            <label for="title">Коментарий</label>
            <textarea class="form-control" name="text" style="width:520px;padding:4px;"></textarea >
        </div> <!-- close form-group -->                
			<button type="submit" class="btn btn-default">Submit</button>
		{{csrf_field()}}
	</form>
	</div> <!-- close form -->
        <p> <h3>Коментарии: </h3> </p>
        @foreach($comment_us as $comment)
<div id="comment">
<p>{{$comment->user()->value('name')}}  </p>
<p> {{$comment->text}} </p>
<p> {{$comment->created_at}} </p>
<hr>
</div> <!-- close comment -->
@endforeach

 @endif
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
