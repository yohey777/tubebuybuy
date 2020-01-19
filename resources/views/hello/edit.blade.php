@extends('layouts.helloapp')

@section('title','Edit')

@section('menubar')
  @parent
  新規作成ページ
@endsection

@section('content')

 
<table>

  <form action="/hello/edit" method="post">
  {{csrf_field()}}
  <input type="hidden" name="id" value="{{$form->id}}">
  <tr>
    <th>name:</th><td><input type="text" name="name" value="{{$form->name}}"></td>
    <th>mail:</th><td><input type="text" name="mail" value="{{$form->mail}}"></td>
    <th>age :</th><td><input type="text" name="age" value="{{$form->age}}"></td>
    <th></th><td><input type="submit" name="send" value="send"></td>
    <th></th><td><a href="/hello">戻る</a></td>
  </tr>
  </form>
</table>
@endsection

@section ('footer')
copyright 2017 tuyano
@endsecttion