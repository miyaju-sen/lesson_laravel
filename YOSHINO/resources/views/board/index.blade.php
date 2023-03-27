@extends('layouts.helloapp')

@section('title', 'Board.index')

@section('menubar')
    @parent
    ボードページ
@endsection

@section('content')
    <table>        
        <tr>
            <th>Data</th>
            <th>Name</th>
        </tr>

        @foreach ($items as $item)
            @if(isset($item->person)) 
                <tr>
                    <td>{{$item->message}}</td>
                    <td>{{$item->person->name}}</td>
                </tr>
            @endif
        @endforeach
    </table>
@endsection

@section('footer')
    copyright 2020 tuyano.
@endsection