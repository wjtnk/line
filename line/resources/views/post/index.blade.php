@extends('layouts.helloapp')

@section('title', 'Index')

@section('menubar')
    @parent
    インデックスページ
@endsection


@section('content')
    <table>
        <tr><th>Message</th><th>getData</th><th width="50px">LINE送信:</th></tr>
        @foreach ($items as $item)
            <tr>
                <td>{{$item->message}}</td>
                <td>{{$item->getData()}}</td>
                <td>
                    <form action="/post/send" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <input type="submit" value="send">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

@section('footer')
    copyright 2017 tuyano.
@endsection

