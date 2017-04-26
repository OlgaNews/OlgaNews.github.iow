
@extends('layouts.site')
@section('content')
<div id="content">

<div id="left">
	<div class="form">
	<form enctype="multipart/form-data" method="POST" action="{!!route('editStore',['id'=>$article->id])!!}">	
                <div class="form-group">
			<label for="cat">Категория</label>
                          <select name="cat">
                        @foreach($categories as $category)
                        @if($category->id==$article->cat)
                        <option selected="selected" value="{{$category->id}}">{{$category->name}}</option>
                        @else
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endif
                        @endforeach
                         </select>  
 		</div> <!-- close form-group -->
            
                <div class="form-group">
			<label for="title">Заголовок</label>
                        <input type="text" class="form-control" value='{{$article->title}}' id="title" name="title" style="width:520px;padding:4px;">
		</div> <!-- close form-group -->
				<div class="form-group">
			<label for="des">Краткое описание</label>
			<textarea class="form-control" name="des"  style="width:520px;padding:4px;">{{$article->des}}</textarea >
		</div> <!-- close form-group -->
		<div class="form-group">
			<label for="text">Полный текст</label>
			<textarea class="form-control" name="text"  style="width:520px;padding:4px;">{{$article->text}}</textarea >
		</div> <!-- close form-group -->
		<div class="form-group">
			<label for="tags">Тэги</label>
			<input type="text" class="form-control" id="tags" value='{{$article->tags}}' name="tags" style="width:520px;padding:4px;">
		</div> <!-- close form-group -->

               <div class="form-group">
			<label for="source">Источник</label>
			<input type="text" class="form-control" id="source" value='{{$article->source}}' name="source" style="width:520px;padding:4px;">
		</div> <!-- close form-group -->
              <div class="form-group">
			<label for="source">Дата создания публикации</label>
                        <input type="datetime" class="form-control" id="created_at" value='{{$article->created_at}}' name="created_at" style="width:520px;padding:4px;">
		</div> <!-- close form-group -->
              <div class="form-group">
			<label for="source">Дата редактирования публикации</label>
                        <input type="datetime" class="form-control" id="updated_at" value='{{$article->updated_at}}' name="updated_at" style="width:520px;padding:4px;">
		</div> <!-- close form-group -->

                <div class="form-group">

                    Картинка: <input type="file" name="uploadfile" value="{{$article->img}}">
            </div> <!-- close form-group -->	
            <button type="submit" class="btn btn-default">Ввод</button>
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

