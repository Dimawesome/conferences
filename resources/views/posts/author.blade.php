@extends('layouts.app')

@section('title', 'Show Author')

@section('content')
    <h2>Show Author</h2>
    <h4>{{ $postTitle }}</h4>
    <p>Author: {{ "{$author['name']}, {$author['surname']}" }}</p>
@endsection
