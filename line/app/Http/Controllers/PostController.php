<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $items = Post::all();
        return view('post.index', ['items' => $items]);
    }

    public function show($id)
    {
        $item = Post::find($id);
//        return $item->toArray();
        return view('post.show', ['item' => $item]);
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $post = new Post;
        $form = $request->all();
        unset($form['_token']);
        $post->fill($form)->save();
        return redirect('/post');
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function send(Request $request)
    {
        $post = Post::find($request->id);
        $access_token = $_ENV['access_token'];
        $user_id = $_ENV['user_id'];
//ヘッダ設定
        $header = array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $access_token
        );

        $message = array(
            'type' => 'text',
            'text' => $post->message
        );

        $body = json_encode(array(
            'to' => $user_id,
            'messages'   => array($message)
        ));

        $options = array(
            CURLOPT_URL=> 'https://api.line.me/v2/bot/message/push',
            CURLOPT_CUSTOMREQUEST  => 'POST',
            CURLOPT_HTTPHEADER     => $header,
            CURLOPT_POSTFIELDS     => $body,
            CURLOPT_RETURNTRANSFER => true
        );


        $curl = curl_init();
        curl_setopt_array($curl, $options);
        curl_exec($curl);
        curl_close($curl);
        return redirect('/post');
    }
}



