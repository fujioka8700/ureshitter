<?php

namespace App\Http\Controllers\Api;

use App\Models\Message;
use App\Http\Controllers\Controller;
use App\Http\Requests\MessagePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MessageController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $messages = Message::orderBy('created_at', 'desc')->paginate(5);

    return response()->json(
      $messages,
      200,
      ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
      JSON_UNESCAPED_UNICODE
    );
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\MessagePostRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(MessagePostRequest $request)
  {
    // 名前が無ければ「名無し」にする
    if (is_null($request->name)) {
      $request->name = '名無し';
    };

    // パスワードの変更が無ければ、「1234」にする
    if (is_null($request->password)) {
      $request->password = '1234';
    }

    $message = Message::create([
      'name' => $request->name,
      'emotion' => $request->emotion,
      'message' => $request->message,
      'password' => Hash::make($request->password),
    ]);

    return response()->json(
      $message,
      201,
      ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
      JSON_UNESCAPED_UNICODE
    );
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $message = Message::find($id);

    return response()->json(
      $message,
      200,
      ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
      JSON_UNESCAPED_UNICODE
    );
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
