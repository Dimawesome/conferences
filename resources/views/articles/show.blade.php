@extends('layouts.app')

@section('content')
    @if($article['is_new'])
        <h2>Article is new!</h2>
    @else
        <h2>Article is old!</h2>
    @endif

    @unless($article['is_new'])
        <h2>Article is old! Unless</h2>
    @else
        <h2>Article is new! Unless</h2>
    @endunless

    @isset($article['has_comments'])
        <h2>Article has some comments! ISSET</h2>
    @else
        <h2>No comments! ISSET</h2>
    @endisset

    <h1>{{ $article['title'] }}</h1>
    <p>{{ $article['content'] }}</p>

    @isset($article['authors'])
        @foreach($article['authors'] as $author)
            <h4>Name: {{ $author['name'] }}</h4>
            <h4>{{ "Surname {$author['surname']}" }}</h4>
        @endforeach
    @else
        <h4>No authors</h4>
    @endisset
@endsection
