<!-- Feature Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-7 mb-5 mb-lg-0">
                <div class="section-title position-relative mb-4">
                    <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Why Choose Us?</h6>
                    <h1 class="display-4"><?php if(isset($whychooseus->title)):?> {{$whychooseus->title}} <?php endif; ?></h1>
                </div>
                <p class="mb-4 pb-2"><?php if(isset($whychooseus->description)): echo $whychooseus->description; endif; ?></p>
                <div class="d-flex mb-3">
                    <div class="btn-icon bg-primary mr-4">
                        <i class="<?php if(isset($whychooseus->icon_1)):?> {{$whychooseus->icon_1}} <?php endif; ?> text-white"></i>
                    </div>
                    <div class="mt-n1">
                        <h4><?php if(isset($whychooseus->Skilled_Instructors_title)):?> {{$whychooseus->Skilled_Instructors_title}} <?php endif; ?></h4>
                        <p><?php if(isset($whychooseus->Skilled_Instructors_description)): echo $whychooseus->Skilled_Instructors_description; endif; ?></p>
                    </div>
                </div>
                <div class="d-flex mb-3">
                    <div class="btn-icon bg-secondary mr-4">
                        <i class="<?php if(isset($whychooseus->icon_2)):?> {{$whychooseus->icon_2}} <?php endif; ?> text-white"></i>
                    </div>
                    <div class="mt-n1">
                        <h4><?php if(isset($whychooseus->International_Certificate_title)):?> {{$whychooseus->International_Certificate_title}} <?php endif; ?></h4>
                        <p><?php if(isset($whychooseus->International_Certificate_description)): echo $whychooseus->International_Certificate_description; endif; ?></p>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="btn-icon bg-warning mr-4">
                        <i class="<?php if(isset($whychooseus->icon_3)):?> {{$whychooseus->icon_3}} <?php endif; ?> text-white"></i>
                    </div>
                    <div class="mt-n1">
                        <h4><?php if(isset($whychooseus->Online_Classes_title)):?> {{$whychooseus->Online_Classes_title}} <?php endif; ?></h4>
                        <p class="m-0"><?php if(isset($whychooseus->Online_Classes_description)): echo $whychooseus->Online_Classes_description; endif; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-5" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100" src="<?php if(isset($whychooseus->image)):?> {{url('Images/whychooseus/'.$whychooseus->image)}} <?php endif; ?>" style="object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature Start -->