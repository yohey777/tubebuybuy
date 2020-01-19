<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Person;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Board;

class HelloController extends Controller
{
  public function index(Request $request)
  {
    $user = Auth::user();
    $sort = $request->sort;
    $items = Person::orderBy('$sort','asc')->simplePaginate(5);
    $boards = \DB::table('boards')->get();
    $param = ['items'=>$items,'sort'=>$sort,'user'=>$user,'boards'=>$boards];
    return view('hello.index',$param);
  }

  public function post(Request $request)
  {
  $items = DB::select('select * from people');
    return view('hello.index',['items'=>$items]);
  }

  public function add(Request $request)
  {
    return view('hello.add');
  }

  public function create(Request $request)
  {
    $param = [
      'name' => $request->name,
      'mail' => $request->mail,
      'age' => $request->age,
    ];

    DB::table('people')->insert($param);
    return redirect('/hello');
  }

  public function edit(Request $request)
  {

    $param = ['id' => $request->id];
   
    $item = DB ::select('select * from people where id= :id',$param);
    $item = DB::table('people')->where('id',$request->id)->first();
    return view('hello.edit',['form'=> $item]);
  }


  public function update(Request $request)
  {
    $param = [
      'name' => $request->name,
      'mail' => $request->mail,
      'age' => $request->age,
    ];
    DB::update('update people set name =:name, mail=:mail ,age = :age where id =:id', $param);
    DB::table('people')
      ->where('id',$request->id)
      ->update($param);
    return redirect('/hello');
  }

  public function del(Request $request)
  {
    $param = ['id'=>$request->id];
    $item = DB::select('select * from people where id =:id',$param);
    $item = DB::table('people')
        ->where('id',$request->id)->first();
    return view('hello.del',['form' => $item]);
  }

  public function remove(Request $request)
  {
    DB::table('people')->where('id', $request->id)->delete();
    $items = Person::orderBy('$sort','asc')->simplePaginate(5);
    return redirect('/hello');
  }

  public function show(Request $request)
  {
    $name = $request->name;
    $items = DB::table('people')
      ->where('name', 'like', '%' . $name . '%')
      ->orWhere('mail', 'like', '%' . $name . '%')
      ->get();

    return view('hello.show',['items' =>$items]);

  }

  public function rest(Request $request)
  {
    return view('hello.rest');

  }
  public function ses_get(Request $request)
  {
    $sesdata = $request->session()->get('msg');
    return view('hello.session',['session_data' => $sesdata]);
  }

  public function ses_put(Request $request)
  {
    $msg = $request->input;
    $request->session()->put('msg',$msg);
    return rediirect('hello/session');
  }

  public function getAuth(Request $request)
  {
    $param = ['message' => 'ログインしてください'];
    return view('hello.auth',$param);
  }

  public function postAuth(Request $request)
  {
    $email = $request->email;
    $password = $request->password;
    if(Auth::attempt(['email' => $email,'password' => $password])){
      $msg = 'ログインしました(' . Auth::user()->name . ')';
    } else {
      $msg = 'ログインに失敗しました';
    }
    return view('hello.auth',['message' => $msg]);
  }

}
