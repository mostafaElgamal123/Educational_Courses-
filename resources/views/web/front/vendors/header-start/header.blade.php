<?php use App\Models\Course;   $course_search=Course::all(); ?>
<!-- Header Start -->
<div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-1">@yield('title')</h1>
            <div class="d-inline-flex text-white mb-5">
                <p class="m-0 text-uppercase"><a class="text-white" href="{{url('home')}}">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">@yield('title')</p>
            </div>
            <div class="mx-auto mb-5" style="width: 100%; max-width: 600px;">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-light bg-white text-body px-4 dropdown-toggle" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Courses</button>
                        <div class="dropdown-menu">
                            @foreach($course_search as $course_sear)
                            <a class="dropdown-item" href="{{url('courses/'.$course_sear->slug)}}">{{$course_sear->title}}</a>
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