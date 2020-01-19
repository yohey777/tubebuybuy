@extends('layouts.helloapp')

@section('title','Index')

@section('menubar')
  @parent
  インデックスページ
@endsection

@section('content')
@if (Auth::check())
<p>USER :{{$user->name . '(' . $user->email . ')'}}</p>
@else
<p>＊ログインしいていません。(<a href="/login">ログイン</a></p>|<a href="/register">登録</a></p>
@endif
<div class="common-index">
  <table class="user-post__list">
    <tr>
      <th>name</th>
      <th>Mail→消す</th>
      <th>Age→出展内容</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
    @foreach($items as $item)

      <tr>
        <td>{{$item->name}}</td>
        <td>{{$item->mail}}</td>
        <td>{{$item->age}}</td>
        <td><a href="/hello/edit?id={{$item->id}}">編集</a></td>
        <td><a href="/hello/del?id={{$item->id}}">削除</a></td>
      </tr>
      @endforeach
  </table>
</div>
    {{$items->links()}}
@endsection




@section('footer')
<a href="/hello/add">新規追加</a>
copyright 2017 tuyano
@endsection