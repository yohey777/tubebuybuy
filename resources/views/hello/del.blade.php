@extends('layouts.helloapp')

@section('title','Delete')

@section('menubar')
  @parent
  新規作成ページ
@endsection

@section('content')
<table>
  <form action="/hello/del" method="post">
  {{csrf_field()}}
  <input type="hidden" name="id" value="{{$form->id}}">
  <tr>
    <th>name:</th><td>{{$form->name}}</td>
    <th>mail:</th><td>{{$form->mail}}</td>
    <th>age :</th><td>{{$form->age}}</td>
    <th></th><td><input type="submit" value="send"></td>
  </tr>
  </form>
</table>
@endsection

@section ('footer')
copyright 2017 tuyano
@endsecttion