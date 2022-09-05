<!-- Detail Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
            <div class="row">
            <div class="col-lg-8">
                <div class="row">
                @foreach($course as $cours)
                <div class="col-lg-6 col-md-6 pb-4">
                    <a class="courses-list-item position-relative d-block overflow-hidden mb-2" href="{{url('courses/'.$cours->id)}}">
                        <img class="img-fluid" src="{{url('Images/course/'.$cours->image)}}" alt="">
                        <div class="courses-text">
                            <h4 class="text-center text-white px-3">{{$cours->title}}</h4>
                            <div class="border-top w-100 mt-3">
                                <div class="d-flex justify-content-between p-4">
                                    <span class="text-white"><i class="fa fa-user mr-2"></i>{{$cours->instructors->name}}</span>
                                    <span class="text-white"><i class="fa fa-star mr-2"></i>{{$cours->rating}}<small>({{$cours->applynows->count()}})</small></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                <div class="col-12">
                    <nav aria-label="Page navigation">
                        {{$course->links('web.front.pagination.paginate')}}
                        </nav>
                </div>
            </div>
            </div>

            <div class="col-lg-4 mt-5 mt-lg-0">
                <div class="mb-5">
                    <h2 class="mb-3">Categories</h2>
                    <ul class="list-group list-group-flush">
                        @foreach($category as $cate)
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="" class="text-decoration-none h6 m-0">{{$cate->name}}</a>
                            <span class="badge badge-primary badge-pill">{{$cate->courses->count()}}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="mb-5">
                    <h2 class="mb-4">Recent Courses</h2>
                    @foreach($course_recent as $course_rece)
                    <a class="d-flex align-items-center text-decoration-none mb-4" href="{{url('courses/'.$course_rece->id)}}">
                        <img class="img-fluid rounded" style="width: 80px;" src="{{url('Images/course/'.$course_rece->image)}}" alt="">
                        <div class="pl-3">
                            <h6>{{$course_rece->title}}</h6>
                            <div class="d-flex">
                                <small class="text-body mr-3"><i class="fa fa-user text-primary mr-2"></i>{{$course_rece->instructors->name}}</small>
                                <small class="text-body"><i class="fa fa-star text-primary mr-2"></i>{{$course_rece->rating}} ({{$course_rece->applynows->count()}})</small>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Detail End -->