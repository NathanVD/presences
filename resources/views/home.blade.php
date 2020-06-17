@extends('layouts.app')

@section('content')

  @include('templates.preloader')

  @include('templates.home.nav')

  @include('templates.home.hero')

  @include('templates.home.about')
  
  @include('templates.home.team')

  @include('templates.home.testimonials')

  @include('templates.home.contact')

  @include('templates.home.newsletter')

  @include('templates.footer')

  @include('templates.gototop')

@endsection
