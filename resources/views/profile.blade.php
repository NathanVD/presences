@extends('layouts.app')

@section('content')

  @include('templates.preloader')

  @include('templates.profile.nav')

  @include('templates.profile.hero')

  @yield('body')

  @include('templates.footer')

  @include('templates.gototop')

@endsection