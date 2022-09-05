@extends('web.front.master')


@section('title','Course')

@section('header-start')
   @include('web.front.vendors.header-start.header')
@endsection

@section('content')
    @include('web.front.vendors.course.course')
@endsection