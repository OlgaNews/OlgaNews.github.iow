@extends('layouts.site')
@section('content')
<div id="content">

<div id="left">
	<div class="form">
            <font size="6" color="black" face="Arial">
	            <form  method="POST" action="{{route('tagShowUrl')}}">	
                <div class="form-group">
			<label for="tags">ВЫБЕРИТЕ ТЕГ</label>
                          <select size=7  style="color: red; font-size: 1em" name="tags">
                        @foreach($tags as $t)
                        @if($t=="футбол")
                        <option selected="selected" value="{{$t}}"><h2>{{$t}}</h2></option>
                        @else
                        <option value="{{$t}}"><h2>{{$t}}</h2></option>
                        @endif
                        @endforeach
                         </select>  
 		</div> <!-- close form-group -->
       
            <button type="submit" class="btn btn-default">Submit</button>
		{{csrf_field()}}
                 </form>
                            </font>

	</div> <!-- close form -->
   {!!$z!!}     
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

