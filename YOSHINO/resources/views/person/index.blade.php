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
                    @if ($item->boards != null)
                        <table width="100%">
                            {{-- ユーザひとりに対して、複数のコメントがあることを想定した場合の処理 --}}
                            @foreach ($item->boards as $obj)
                                <tr>
                                    <td>{{$obj->getData()}}</td>
                                </tr>
                            @endforeach
                        </table>
                    @endif

                    {{-- @if ($item->board != null) --}}
                        {{-- Board.phpのgetData()を呼び出してる --}}
                        {{-- {{ $item->board->getData() }} --}}
                    {{-- @endif --}}
                </td>
            </tr>
        @endforeach
    </table>
@endsection

@section('footer')
    copyright 2020 tuyano.
@endsection