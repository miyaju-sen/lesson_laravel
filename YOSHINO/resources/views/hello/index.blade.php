@extends('layouts.helloapp')

@section('title', 'Index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <p>ここが本文のコンテンツです。</p>

    <ul>
        {{-- $data という変数を 'item' に入れてる --}}
        @each('components.item', $data, 'item')
    </ul>
@endsection

@section('footer')
    copyright 2020 tuyano.
@endsection