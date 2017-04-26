@extends('layouts.site')
@section('content')
<div id="content">

<div id="left">
       {!!$z!!}
	<div class="form">
	<form enctype="multipart/form-data" method="POST" action="{!!route('contactPost')!!}">	
            	<div class="form-group">    	
                <label for="fio">ФИО</label>
		<input type="text" class="form-control" id="title" name="fio" style="width:520px;padding:4px;">
		</div> <!-- close form-group -->
                    <div class="form-group">
                    <label for="phone">Телефон</label>
                    <input type="tel" class="form-control" id="title" placeholder="+38(050) 123-45-67" title="Формат ввода (050) 123-45-67" name="phone" style="width:520px;padding:4px;">
                    </div> <!-- close form-group -->
                <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="title" name="email" style="width:520px;padding:4px;">
                </div> <!-- close form-group -->
                    <div class="form-group">
                    <label for="message">Сообщение</label>
                    <textarea class="form-control" name="message" style="width:520px;padding:4px;"></textarea >
                    </div> <!-- close form-group -->
                    <div class="g-recaptcha" data-sitekey="6Levzx4UAAAAAKLyYKasW_V8LPJGO_0ypb8v8N4e"></div>
                    
            <button type="submit" class="btn btn-default">Отправить</button>
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

