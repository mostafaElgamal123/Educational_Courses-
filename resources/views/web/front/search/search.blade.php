@extends('web.front.master')


@section('title','Search')

@section('header-start')
   @include('web.front.vendors.header-start.header')
@endsection

@section('content')
    @include('web.front.vendors.search.search')
@endsection