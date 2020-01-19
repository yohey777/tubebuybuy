@extends('layouts.helloapp')

@section('title','Session')

@section('menubar')
  @parent
  新規作成ページ
@endsection

@section('content')
    <p>{{$session_data}}</p>
    <form action="/hello/session" method="posts">
      {{csrf_field()}}
      <input type="text" name="input">
      <input type="submit" value="send">
    </form>
@endsection

@section ('footer')
copyright 2017 tuyano
@endsection