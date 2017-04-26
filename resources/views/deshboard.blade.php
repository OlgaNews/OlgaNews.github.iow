@extends('layouts.admin')
@section('content')
<div id="content">
<div id="m_a">

<div id="nav_a">
<ul id="n_a">
<li id="active"><a href="{{ route('admin') }}" id="current">Главная</a></li>
<li><a href="{{ route('add')}}">Добавление новости </a></li>
<li><a href="{{ route('delete')}}">Удаление новости</a></li>
<li><a href="{{ route('edit')}}">Редактирование новостей</a></li>
<li><a href="{{ route('addCat')}}">Добавление категории</a></li>
<li><a href="{{ route('deleteCom')}}">Удаление коментария</a></li>
<li><a href="{{ route('deleteUser')}}">Удаление пользователей</a></li>
</ul>
</div> <!-- close navcontainer -->
</div> <!-- close menu -->

 </div> <!-- close content -->
@endsection
