@extends('layouts.app')

@section('content')

  @include('templates.preloader')

  @include('templates.register.nav')

  @include('templates.register.hero')

  @yield('form')

  @include('templates.footer')

  @include('templates.gototop')

@endsection