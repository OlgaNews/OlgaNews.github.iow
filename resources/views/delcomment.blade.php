@extends('layouts.admin')
@section('content')
<div id="content">
    <div id="left">
  <div class="form">
	<form method="POST" action="{{route('delCom',['id'=>$id])}}">	
	<div class="form-group">	
          <h2>Вы действительно хотите удалить этот коментарий?</h2>
            
        </div> <!-- close form-group --> 
        <br>
			<button type="submit" name="NO" class="btn btn-default">НЕТ</button>
                        <button type="submit" name="DEL" class="btn btn-default">УДАЛИТЬ</button>
		{{csrf_field()}}
	</form>
	</div> <!-- close form -->
    </div>
    <div class="spacer"></div>
</div>
@endsection
