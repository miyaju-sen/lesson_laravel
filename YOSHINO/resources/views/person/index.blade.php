@extends('layouts.helloapp')

@section('title', 'Person.index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <table>        
        <tr>
            <th>Person</th>
            <th>Board</th>
        </tr>

        @foreach ($items as $item)
            <tr>
                <td>{{$item->getData()}}</td>
                <td>
                    @if ($item->board != null)
                        {{-- Board.phpのgetData()を呼び出してる --}}
                        {{ $item->board->getData() }}
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
@endsection

@section('footer')
    copyright 2020 tuyano.
@endsection