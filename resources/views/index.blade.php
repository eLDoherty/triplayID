@extends('layout.master')

@section('content')

    @include('component.hero')
    @include('component.intro')
    @include('component.slider')
    @include('component.game')
    @include('component.provider')
    @include('component.payment')
    @include('component.embeded')
    @include('component.footer')

@endsection