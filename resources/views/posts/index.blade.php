@extends('layouts.app')

@section('title', 'Posts List')

@section('content')
    <h2>Posts List</h2>
    @foreach($posts as $post)
        <h4>{{ $post['title'] }}</h4>
        <p>{{ $post['content'] }}</p>
    @endforeach
@endsection
