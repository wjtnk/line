@extends('layouts.helloapp')

@section('title', 'Index')

@section('menubar')
    @parent
    インデックスページ
@endsection


@section('content')
    <table>
        <tr><th>Message</th><th>getData</th></tr>
        @foreach ($items as $item)
            <tr>
                <td>{{$item->message}}</td>
                <td>{{$item->getData()}}</td>
            </tr>
        @endforeach
    </table>
@endsection

@section('footer')
    copyright 2017 tuyano.
@endsection

