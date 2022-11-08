<!-- Detail Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="mb-5">
                    <div class="section-title position-relative mb-5">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Course Detail</h6>
                        <h1 class="display-4">{{$course->title}}</h1>
                    </div>
                    <img class="img-fluid rounded w-100 mb-4" src="{{asset('storage/'.$course->image)}}" alt="Image">
                    <?php echo $course->description; ?>
                </div>
                <h2 class="mb-3">Related Courses</h2>
                <div class="owl-carousel related-carousel position-relative" style="padding: 0 30px;">
                @foreach($related_course as $related)
                    <a class="courses-list-item position-relative d-block overflow-hidden mb-2" href="{{url('courses/'.$related->slug)}}">
                        <img class="img-fluid" src="{{asset('storage/'.$related->image)}}" alt="">
                        <div class="courses-text">
                            <h4 class="text-center text-white px-3">{{$related->title}}</h4>
                            <div class="border-top w-100 mt-3">
                                <div class="d-flex justify-content-between p-4">
                                    <span class="text-white"><i class="fa fa-user mr-2"></i>{{$related->instructors->name}}</span>
                                    <span class="text-white"><i class="fa fa-star mr-2"></i>{{$related->rating}}
                                    <small>({{$related->applynows->count()}})</small></span>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
                </div>
            </div>

            <div class="col-lg-4 mt-5 mt-lg-0">
                <div class="bg-primary mb-5 py-3">
                    <h3 class="text-white py-3 px-4 m-0">Course Features</h3>
                    <div class="d-flex justify-content-between border-bottom px-4">
                        <h6 class="text-white my-3">Instructor</h6>
                        <h6 class="text-white my-3">{{$course->instructors->name}}</h6>
                    </div>
                    <div class="d-flex justify-content-between border-bottom px-4">
                        <h6 class="text-white my-3">Rating</h6>
                        <h6 class="text-white my-3">{{$course->rating}}<small>({{$course->applynows->count()}})</small></h6>
                    </div>
                    <div class="d-flex justify-content-between border-bottom px-4">
                        <h6 class="text-white my-3">Lectures</h6>
                        <h6 class="text-white my-3">{{$course->lectures}}</h6>
                    </div>
                    <div class="d-flex justify-content-between border-bottom px-4">
                        <h6 class="text-white my-3">Duration</h6>
                        <h6 class="text-white my-3">{{$course->duration}} Hrs</h6>
                    </div>
                    <div class="d-flex justify-content-between border-bottom px-4">
                        <h6 class="text-white my-3">Skill level</h6>
                        <h6 class="text-white my-3">{{$course->Skill_level}}</h6>
                    </div>
                    <div class="d-flex justify-content-between px-4">
                        <h6 class="text-white my-3">Language</h6>
                        <h6 class="text-white my-3">{{$course->language}}</h6>
                    </div>
                    @if(isset($course->discount)&&$course->discount > 0)
                    <h5 class="text-white py-3 px-4 m-0">Offer: {{$course->discount}} % OFF</h5>
                    @endif
                    <div class="py-3 px-4">
                        <a class="btn btn-block btn-secondary py-3 px-5" href="{{URL('checkouts/'.$course->slug)}}">Enroll Now</a>
                    </div>
                </div>

                <div class="mb-5">
                    <h2 class="mb-3">Categories</h2>
                    <ul class="list-group list-group-flush">
                        @foreach($category as $cate)
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="{{url('categories/'.$cate->slug)}}" class="text-decoration-none h6 m-0">{{$cate->name}}</a>
                            <span class="badge badge-primary badge-pill">{{$cate->courses->count()}}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="mb-5">
                    <h2 class="mb-4">Recent Courses</h2>
                    @foreach($course_recent as $course_rece)
                    <a class="d-flex align-items-center text-decoration-none mb-4" href="{{url('courses/'.$course_rece->id)}}">
                        <img class="img-fluid rounded" style="width: 80px;" src="{{asset('storage/'.$course_rece->image)}}" alt="">
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