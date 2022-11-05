@extends('layouts.app')

@section('title', 'Article Creation Form')

@section('content')
    <form action="{{ route('articles.store') }}" method="POST">
        @csrf
        <div>
            <label for="title-input">Title</label>
            <input type="text" id="title-input" name="title" value="{{ old('title') }}">
            @error('title')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="content-input">Content</label>
            <textarea id="content-input" name="content">{{ old('content')}}</textarea>
            @error('content')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div><input type="submit" value="Create"></div>
    </form>
@endsection
