@extends('common.layout')
@section('page_content')
    <h1>{{ $content }}</h1>
    @foreach ($rows as $row)
        <p>The row is : {{ $row->TestColumn }}
    @endforeach
@endsection
