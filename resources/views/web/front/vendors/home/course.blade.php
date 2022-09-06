<!-- Courses Start -->
<div class="container-fluid px-0 py-5">
    <div class="row mx-0 justify-content-center pt-5">
        <div class="col-lg-6">
            <div class="section-title text-center position-relative mb-4">
                <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Our Courses</h6>
                <h1 class="display-4">Checkout New Releases Of Our Courses</h1>
            </div>
        </div>
    </div>
    <div class="owl-carousel courses-carousel">
    @foreach($course as $cours)
        <div class="courses-item position-relative">
            <img class="img-fluid" src="{{url('Images/course/'.$cours->image)}}" alt="">
            <div class="courses-text">
                <h4 class="text-center text-white px-3">{{$cours->title}}</h4>
                <div class="border-top w-100 mt-3">
                    <div class="d-flex justify-content-between p-4">
                        <span class="text-white"><i class="fa fa-user mr-2"></i>{{$cours->instructors->name}}</span>
                        <span class="text-white"><i class="fa fa-star mr-2"></i>{{$cours->rating}} <small>({{$cours->applynows->count()}})</small></span>
                    </div>
                </div>
                <div class="w-100 bg-white text-center p-4" >
                    <a class="btn btn-primary" href="{{url('courses/'.$cours->id)}}">Course Detail</a>
                </div>
            </div>
            @if(isset($cours->discount)&&$cours->discount > 0)
            <div class="card-discount" style="top:8px !important;">
                <div class="line"></div>
                <span>{{$cours->discount}}%</span>
            </div>
            @endif
        </div>
    @endforeach
    </div>
    <div class="row justify-content-center bg-image mx-0 mb-5">
        <div class="col-lg-6 py-5">
            <div class="bg-white p-5 my-5">
                <h1 class="text-center mb-4">Apply Now</h1>
                <form id="ApplyForm">
                    <div class="alterSuccesscourse">

                    </div>
                    <div class="form-row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" id="name" value="{{old('name')}}" class="form-control bg-light border-0" placeholder="Your Name" style="padding: 30px 20px;">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="email" id="email" value="{{old('email')}}" class="form-control bg-light border-0" placeholder="Your Email" style="padding: 30px 20px;">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" id="phone" value="{{old('phone')}}" class="form-control bg-light border-0" placeholder="Your Phone" style="padding: 30px 20px;">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" id="faculty" value="{{old('faculty')}}" class="form-control bg-light border-0" placeholder="Your Faculty" style="padding: 30px 20px;">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select id="course_id" value="{{old('course_id')}}" class="custom-select bg-light border-0 px-3" style="height: 60px;">
                                    <option selected>Select A courses</option>
                                    @foreach($course as $cours)
                                    <option value="{{$cours->id}}">{{$cours->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <button class="btn btn-primary btn-block" type="submit" style="height: 60px;">Sign Up Now</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Courses End -->
<script>
  $('#ApplyForm').on('submit',function(e){
    e.preventDefault();

    let name = $('#name').val();
    let phone = $('#phone').val();
    let email = $('#email').val();
    let faculty = $('#faculty').val();
    let course_id = $('#course_id').val();
    var opSuccess=" ";
    var opError=" ";
    $.ajax({
      url: "{{url('applynows')}}",
      type:"post",
      data:{
        "_token": "{{ csrf_token() }}",
        name:name,
        phone:phone,
        email:email,
        faculty:faculty,
        course_id:course_id,
      },
      success:function(response){
        if(response){
          $("#ApplyForm")[0].reset(); 
          //console.log(data);
        opSuccess+='<div class="alert alert-success">'+response.success+'</div>';
        $('.alterSuccesscourse').html(" ");
        $('.alterSuccesscourse').append(opSuccess);
        }
      },
      error:function(error2){
        if(error2){
            if(isset(error2.responseJSON.errors.email)){
                opError+='<div class="alert alert-danger">'+error2.responseJSON.errors.email+'</div>';
            }
            if(isset(error2.responseJSON.errors.faculty)){
                opError+='<div class="alert alert-danger">'+error2.responseJSON.errors.faculty+'</div>';
            }
            if(isset(error2.responseJSON.errors.name)){
                opError+='<div class="alert alert-danger">'+error2.responseJSON.errors.name+'</div>';
            }
            if(isset(error2.responseJSON.errors.phone)){
                opError+='<div class="alert alert-danger">'+error2.responseJSON.errors.phone+'</div>';
            }
            $('.alterSuccesscourse').html(" ");
            $('.alterSuccesscourse').append(opError);
        }
      }
      });
    });
</script>