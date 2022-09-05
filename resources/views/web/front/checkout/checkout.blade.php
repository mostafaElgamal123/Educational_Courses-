@extends('web.front.master')


@section('title','Checkout')

@section('header-start')
   @include('web.front.vendors.header-start.header')
@endsection

@section('content')
    @include('web.front.vendors.checkout.checkout')
@endsection