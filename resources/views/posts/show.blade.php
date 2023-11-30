@extends('layouts.app')

@section('title', 'Show Post')

@section('content')
    <h2>Show Post</h2>
    <h4>{{ $post['title'] }}</h4>
    <p>{{ $post['content'] }}</p>
@endsection
