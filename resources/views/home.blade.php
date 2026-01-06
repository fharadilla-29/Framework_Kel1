@extends('layouts.app')

@section('content')
    @include('partials.hero')
    @include('partials.about')
    @include('partials.search-modal')
    @include('partials.feature')
    @include('partials.counter')
   {{-- @include('partials.service') --}}
    {{-- @include('partials.product') --}}
    {{-- @include('partials.blog') --}}
   {{-- @include('partials.team') --}}
    {{-- @include('partials.testimonial') --}}
@endsection
