@extends('layouts.helloapp')

@section('title','Add')

@section('menubar')
  @parent
  新規作成ページ
@endsection

@section('content')
<table>
  <form action="/hello/add" method="post">
  {{csrf_field()}}
  <tr>
    <th>name:</th><td><input type="text" name="name"></td>
    <th>mail:</th><td><input type="text" name="mail"></td>
    <th>age :</th><td><input type="text" name="age"></td>
    <th></th><td><input type="submit" name="send"></td>
  </tr>
  </form>
</table>
@endsection

@section ('footer')
<a href="/hello/">戻る</a>
copyright 2017 tuyano
@endsection