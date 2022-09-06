<!-- Footer Start -->
<div class="container-fluid position-relative overlay-top bg-dark text-white-50 py-5" style="margin-top: 90px;">
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-md-6 mb-5">
                <a href="index.html" class="navbar-brand">
                    <h1 class="mt-n2 text-uppercase text-white"><i class="fa fa-book-reader mr-3"></i>Edukate</h1>
                </a>
                <p class="m-0">Accusam nonumy clita sed rebum kasd eirmod elitr. Ipsum ea lorem at et diam est, tempor rebum ipsum sit ea tempor stet et consetetur dolores. Justo stet diam ipsum lorem vero clita diam</p>
            </div>
            <div class="col-md-6 mb-5">
                <h3 class="text-white mb-4">Newsletter</h3>
                    <div class="alterSuccessletter">

                    </div>
                <div class="w-100">
                    <form id="newslettersubmit">
                        <div class="input-group">
                            <input type="email" id="newsletter" class="form-control border-light" style="padding: 30px;" placeholder="Your Email Address">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary px-4">Sign Up</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-5">
                <h3 class="text-white mb-4">Get In Touch</h3>
                <p><i class="fa fa-map-marker-alt mr-2"></i>@if(isset($media->location)) {{$media->location}} @endif</p>
                <p><i class="fa fa-phone-alt mr-2"></i>@if(isset($media->phone)) {{$media->phone}} @endif</p>
                <p><i class="fa fa-envelope mr-2"></i>@if(isset($media->email)) {{$media->email}} @endif</p>
                <div class="d-flex justify-content-start mt-4">
                    <a class="text-white mr-4" href="@if(isset($media->twitter)) {{$media->twitter}} @endif"><i class="fab fa-2x fa-twitter"></i></a>
                    <a class="text-white mr-4" href="@if(isset($media->facebook)) {{$media->facebook}} @endif"><i class="fab fa-2x fa-facebook-f"></i></a>
                    <a class="text-white mr-4" href="@if(isset($media->linkedin)) {{$media->linkedin}} @endif"><i class="fab fa-2x fa-linkedin-in"></i></a>
                    <a class="text-white" href="@if(isset($media->instagram)) {{$media->instagram}} @endif"><i class="fab fa-2x fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <h3 class="text-white mb-4">Our Courses</h3>
                <div class="d-flex flex-column justify-content-start">
                    @foreach($category as $cate)
                    <a class="text-white-50 mb-2" href="{{url('categories/'.$cate->id)}}"><i class="fa fa-angle-right mr-2"></i>{{$cate->name}}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <h3 class="text-white mb-4">Quick Links</h3>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white-50 mb-2" href="{{url('home')}}"><i class="fa fa-angle-right mr-2"></i>Home</a>
                    <a class="text-white-50 mb-2" href="{{url('about')}}"><i class="fa fa-angle-right mr-2"></i>About</a>
                    <a class="text-white-50 mb-2" href="{{url('course')}}"><i class="fa fa-angle-right mr-2"></i>Course</a>
                    <a class="text-white-50" href="{{url('contact')}}"><i class="fa fa-angle-right mr-2"></i>Contact</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-dark text-white-50 border-top py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0">Copyright &copy; <a class="text-white" href="#">Elgamal</a>. All Rights Reserved.
                </p>
            </div>
            <div class="col-md-6 text-center text-md-right">
                <p class="m-0">Designed by <a class="text-white" href="https://www.facebook.com/profile.php?id=100024409749882">Mostafa Elgamal</a>
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>

@include('web.front.layout.footer.vendors')
@include('web.front.layout.footer.main-js')
<script>
  $('#newslettersubmit').on('submit',function(e){
    e.preventDefault();

    let newsletter = $('#newsletter').val();
    console.log(newsletter);
    var opSuccess=" ";
    var opError=" ";
    $.ajax({
      url: "{{url('newsletter')}}",
      type:"post",
      data:{
        "_token": "{{ csrf_token() }}",
        newsletter:newsletter,
      },
      success:function(response){
        if(response){
          $("#newslettersubmit")[0].reset(); 
          //console.log(data.length);
        opSuccess+='<div class="alert alert-success">'+response.successletter+'</div>';
        $('.alterSuccessletter').html(" ");
        $('.alterSuccessletter').append(opSuccess);
        }
      },

      });
    });
</script>
