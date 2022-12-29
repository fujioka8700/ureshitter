<?php

namespace App\Http\Controllers\Api;

use App\Models\Message;
use App\Http\Controllers\Controller;
use App\Http\Requests\MessagePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MessageController extends Controller
{
  const HEADERS = ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'];

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
      self::HEADERS,
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
      self::HEADERS,
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

    // リクエストされたパスパラメーターで
    // メッセージが無ければ、メッセージは無い事を返す。
    if (is_null($message)) {
      $errorMessage = ['error' => 'メッセージはありません。'];

      return response()->json(
        $errorMessage,
        404,
        self::HEADERS,
        JSON_UNESCAPED_UNICODE
      );
    }

    return response()->json(
      $message,
      200,
      self::HEADERS,
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
    $message = Message::find($id);
    $messagePassword = $message->password;
    $requestPassword = request()->password;

    $passwordMatch = Hash::check($requestPassword, $messagePassword);

    $deletedCount = json_encode([], JSON_FORCE_OBJECT);

    if ($passwordMatch === true) {
      $deletedCount = ['deleteCount' => $message->destroy($message->id)];
    } else {
      $deletedCount = ['deleteCount' => 0];
    }

    return response()->json(
      $deletedCount,
      200,
      self::HEADERS,
      JSON_UNESCAPED_UNICODE
    );
  }
}
