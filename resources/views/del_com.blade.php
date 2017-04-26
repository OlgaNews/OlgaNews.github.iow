@extends('layouts.admin')
@section('content')
<div id="content">
    <div id="left">
       @foreach($comments as $comment)
       <div id="comment">
 <p>
 <h3 ><a >{{$comment->text}} </a></h3>
{{$articles->find($comment->newsid)->title}}
 
 <form  style="width: 50px" method="POST" action="{{route('comDelete',['id'=>$comment->id])}}">
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
