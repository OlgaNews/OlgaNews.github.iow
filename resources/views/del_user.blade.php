@extends('layouts.admin')
@section('content')
<div id="content">
    <div id="left">
       @foreach($users as $user)
 @if($user->id<>1)
       <div id="comment">
 <p>
 <h3 ><a >{{$user->name}} </a></h3>
{{$user->email}}
 
 <form  style="width: 50px" method="POST" action="{{route('userDelete',['id'=>$user->id])}}">
<button type="submit" class="btn btn-default">Удалить</button>
{{csrf_field()}}      
</form>
  </p>
    
</div> 
 @endif
       @endforeach   
  
        
    </div>

<div class="spacer"></div>
</div>

@endsection
