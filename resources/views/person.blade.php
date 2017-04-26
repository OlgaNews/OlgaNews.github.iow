
@extends('layouts.site')
@section('content')
<div id="content">

<div id="left">
    {!!$z!!}
	<div class="form">
	<form  method="POST" >	
            
                <div class="form-group">
			<label for="password">Новый пароль</label>
			<input type="text" class="form-control" id="password" name="password" style="width:520px;padding:4px;">
		</div> <!-- close form-group -->
				<div class="form-group">
           </div> <!-- close form-group -->	
            <button type="submit" class="btn btn-default">Добавить</button>
		{{csrf_field()}}
                 </form>


	</div> <!-- close form -->
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

