@extends('layouts.helloapp')

@section('title', 'Show')

@section('menubar')
    @parent
    詳細ページ
@endsection

@section('content')
    <table width="400px">
        <tr><th width="50px">id:</th>
            <td width="50px">{{$item->id}}</td>
            <th width="50px">message:</th>
            <td>{{$item->message}}</td></tr>
            <th width="50px">LINE送信:</th>
            <td>
                <form action="/post/send" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <input type="submit" value="send">
                </form>
            </td>

        </tr>
    </table>
@endsection

@section('footer')
    copyright 2017 tuyano.
@endsection
