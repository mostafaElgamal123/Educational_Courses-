<!-- Team Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="section-title text-center position-relative mb-5">
            <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Instructors</h6>
            <h1 class="display-4">Meet Our Instructors</h1>
        </div>
        <div class="owl-carousel team-carousel position-relative" style="padding: 0 30px;">
        @foreach($instructor as $instruct)
            <div class="team-item">
                <img class="img-fluid w-100" src="{{asset('storage/'.$instruct->image)}}" alt="">
                <div class="bg-light text-center p-4">
                    <h5 class="mb-3">{{$instruct->name}}</h5>
                    <p class="mb-2">{{$instruct->categories->name}}</p>
                    <div class="d-flex justify-content-center">
                        <a class="mx-1 p-1" href="{{$instruct->twitter}}"><i class="fab fa-twitter"></i></a>
                        <a class="mx-1 p-1" href="{{$instruct->facebook}}"><i class="fab fa-facebook-f"></i></a>
                        <a class="mx-1 p-1" href="{{$instruct->linkedin}}"><i class="fab fa-linkedin-in"></i></a>
                        <a class="mx-1 p-1" href="{{$instruct->instagram}}"><i class="fab fa-instagram"></i></a>
                        <a class="mx-1 p-1" href="{{$instruct->YouTube}}"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>
<!-- Team End -->