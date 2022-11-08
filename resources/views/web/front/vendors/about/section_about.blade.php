<!-- About Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100" src="<?php if(isset($about->image)):?> {{asset('storage/'.$about->image)}} <?php endif; ?>" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="section-title position-relative mb-4">
                    <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">About Us</h6>
                    <h1 class="display-4"><?php if(isset($about->title)):?> {{$about->title}} <?php endif; ?></h1>
                </div>
                <p><?php if(isset($about->description)): echo $about->description; endif; ?></p>
                <div class="row pt-3 mx-0">
                    <div class="col-3 px-0">
                        <div class="bg-success text-center p-4">
                            <h1 class="text-white" data-toggle="counter-up"><?php if(isset($about->available_subject)):?> {{$about->available_subject}} <?php endif; ?></h1>
                            <h6 class="text-uppercase text-white">Available<span class="d-block">Subjects</span></h6>
                        </div>
                    </div>
                    <div class="col-3 px-0">
                        <div class="bg-primary text-center p-4">
                            <h1 class="text-white" data-toggle="counter-up"><?php if(isset($about->online_courses)):?> {{$about->online_courses}} <?php endif; ?></h1>
                            <h6 class="text-uppercase text-white">Online<span class="d-block">Courses</span></h6>
                        </div>
                    </div>
                    <div class="col-3 px-0">
                        <div class="bg-secondary text-center p-4">
                            <h1 class="text-white" data-toggle="counter-up"><?php if(isset($about->skilled_instructors)):?> {{$about->skilled_instructors}} <?php endif; ?></h1>
                            <h6 class="text-uppercase text-white">Skilled<span class="d-block">Instructors</span></h6>
                        </div>
                    </div>
                    <div class="col-3 px-0">
                        <div class="bg-warning text-center p-4">
                            <h1 class="text-white" data-toggle="counter-up"><?php if(isset($about->happy_students)):?> {{$about->happy_students}} <?php endif; ?></h1>
                            <h6 class="text-uppercase text-white">Happy<span class="d-block">Students</span></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->