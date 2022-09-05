@extends('web.front.master')


@section('title','home page')

@section('header-start')
<?php use App\Models\Course;   $course_search=Course::all(); ?>
    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center my-5 py-5">
            <h1 class="text-white mt-4 mb-4">Learn From Home</h1>
            <h1 class="text-white display-1 mb-5">Education Courses</h1>
            <div class="mx-auto mb-5" style="width: 100%; max-width: 600px;">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-light bg-white text-body px-4 dropdown-toggle" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Courses</button>
                        <div class="dropdown-menu">
                           @foreach($course_search as $course_sear)
                            <a class="dropdown-item" href="{{url('courses/'.$course_sear->id)}}">{{$course_sear->title}}</a>
                            @endforeach
                        </div>
                    </div>
                    <form action="{{url('search')}}" method="get" class="d-flex">
                        <input type="text" name="search" id="search" class="form-control border-light" style="padding: 30px 68px;" placeholder="Keyword">
                        <div class="input-group-append">
                            <button id="SubmitSearch" class="btn btn-secondary px-4 px-lg-5">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
@endsection

@section('content')
     <!-- About Start -->
     @include('web.front.vendors.about.section_about')
    <!-- About End -->


    <!-- Feature Start -->
    @include('web.front.vendors.home.whychoose')
    <!-- Feature Start -->


    <!-- Courses Start -->
    @include('web.front.vendors.home.course')
    <!-- Courses End -->


    <!-- Team Start -->
    @include('web.front.vendors.about.instructor')
    <!-- Team End -->


    <!-- Testimonial Start -->
    @include('web.front.vendors.home.testimional')
    <!-- Testimonial Start -->


    <!-- Contact Start -->
    @include('web.front.vendors.contact.contact')
    <!-- Contact End -->
@endsection