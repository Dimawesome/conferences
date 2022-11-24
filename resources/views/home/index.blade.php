@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h5>{{ __('app.home_module.index_title') }}</h5>
    <p>{{ __('app.home_module.welcome', ['name' => 'John']) }}</p>
@endsection
