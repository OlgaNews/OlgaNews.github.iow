
@extends('layouts.site')
@section('content')
<div id="content">

<div id="left">
	<div class="form">
	<form enctype="multipart/form-data" method="POST" action="{!!route('articleStore')!!}">	
                <div class="form-group">
			<label for="cat">Категория</label>
                          <select name="cat">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                         </select>  
 		</div> <!-- close form-group -->
            
                <div class="form-group">
			<label for="title">Заголовок</label>
			<input type="text" class="form-control" id="title" name="title" style="width:520px;padding:4px;">
		</div> <!-- close form-group -->
				<div class="form-group">
			<label for="des">Краткое описание</label>
			<textarea class="form-control" name="des" style="width:520px;padding:4px;"></textarea >
		</div> <!-- close form-group -->
		<div class="form-group">
			<label for="text">Полный текст</label>
			<textarea class="form-control" name="text" style="width:520px;padding:4px;"></textarea >
		</div> <!-- close form-group -->
		<div class="form-group">
			<label for="tags">Тэги</label>
			<input type="text" class="form-control" id="tags" name="tags" style="width:520px;padding:4px;">
		</div> <!-- close form-group -->

               <div class="form-group">
			<label for="source">Источник</label>
			<input type="text" class="form-control" id="source" name="source" style="width:520px;padding:4px;">
		</div> <!-- close form-group -->
	     <div class="form-group">
            Картинка: <input type="file" name="uploadfile">
            </div> <!-- close form-group -->	
            <button type="submit" class="btn btn-default">Submit</button>
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

