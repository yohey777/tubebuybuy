@extends('layouts.helloapp')

@section('title', 'Person.index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
<div class="common-index">
  <table class="user-post__list">
    <tr><th>Person</th><th>Board</th></tr>
    @foreach ($hasItems as $item)
        <tr>
            <td>いい{{$item->getData()}}</td>
            <td>
              <table width="100%">
              @foreach ($item->boards as $obj)
                  <tr><td>{{$obj->getData()}}</td></tr>
              @endforeach
              </table>
            </td>
        </tr>
    @endforeach
  </table>
  <div style="margin:10px"></div>
  <table>
    <tr><th>Person</th></tr>
    @foreach ($noItems as $item)
    <tr>
      <td>{{$item->getData()}}</td>
    </tr>
    @endforeach
  </table>
</div>
@endsection

@section('footer')
copyright 2017 tuyano.
@endsection
