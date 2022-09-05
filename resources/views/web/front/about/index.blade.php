@extends('web.front.master')


@section('title','About')

@section('header-start')
   @include('web.front.vendors.header-start.header')
@endsection

@section('content')
    @include('web.front.vendors.about.section_about')
    @include('web.front.vendors.about.section_why_choose_us')
    @include('web.front.vendors.about.instructor')
    @include('web.front.vendors.about.testimional')
@endsection