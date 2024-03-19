@extends('layout.master')
@section('title')
{{ __('RAV |'.' '.'Error') }}
@endsection
@section('content')
<div class="container common-container">
    <div class="section-error">
        <h1 class="error">404</h1>
        <div class="page">The page you are looking for is not found</div>
        {{-- <a class="back-home" href="{{url('/')}}">Back to home</a> --}}
    </div>
</div>
@endsection