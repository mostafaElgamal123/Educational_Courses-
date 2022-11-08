<!-- Testimonial Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-5 mb-lg-0">
                <div class="section-title position-relative mb-4">
                    <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Testimonial</h6>
                    <h1 class="display-4">What Say Our Students</h1>
                </div>
                <p class="m-0">Dolor est dolores et nonumy sit labore dolores est sed rebum amet, justo duo ipsum sanctus dolore magna rebum sit et. Diam lorem ea sea at. Nonumy et at at sed justo est nonumy tempor. Vero sea ea eirmod, elitr ea amet diam ipsum at amet. Erat sed stet eos ipsum diam</p>
            </div>
            <div class="col-lg-7">
                <div class="owl-carousel testimonial-carousel">
                    @foreach($testimonial as $testimoni)
                    <div class="bg-light p-2">
                        <p><img class="w-100" style="height:182px;" src="{{asset('storage/'.$testimoni->image)}}" alt=""></p>
                        <div class="d-flex flex-shrink-0 align-items-center mt-4">
                            <img class="img-fluid mr-4" src="{{asset('assets/img/img_avatar.png')}}" alt="">
                            <div>
                                <h5>{{$testimoni->title}}</h5>
                                <span>{{$testimoni->description}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial Start -->