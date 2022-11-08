<!-- Intro Courses -->
<section class="intro-section gray-bg pt-94 pb-100 md-pt-64 md-pb-70">
    <div class="container">
        <div class="row clearfix">
            <!-- Content Column -->
            <div class="col-lg-6 md-mb-50">
                <!-- Intro Info Tabs-->
                <div class="intro-info-tabs">
                    <ul class="nav nav-tabs intro-tabs tabs-box" id="myTab" role="tablist">
                        <li class="nav-item tab-btns">
                            <a class="nav-link tab-btn active" id="prod-overview-tab" data-toggle="tab" href="#prod-overview" role="tab" aria-controls="prod-overview" aria-selected="true">Content</a>
                        </li>
                        
                        
                        <li class="nav-item tab-btns">
                            <a class="nav-link tab-btn" id="prod-reviews-tab" data-toggle="tab" href="#prod-reviews" role="tab" aria-controls="prod-reviews" aria-selected="false">Reviews</a>
                        </li>

                        <li class="nav-item tab-btns">
                            <a class="nav-link tab-btn " id="prod-reviews-tab" data-toggle="tab" href="#prod-feedback" role="tab" aria-controls="prod-reviews" aria-selected="false">Feedback</a>
                        </li>
                        
                    </ul>
                    <div class="tab-content tabs-content p-4" id="myTabContent">
                        <div class="tab-pane tab fade show active" id="prod-overview" role="tabpanel" aria-labelledby="prod-overview-tab">
                            <div class="content white-bg pt-30">
                                <!-- Cource Overview -->
                                <div class="course-overview">
                                    <div class="inner-box">
                                        <?php if(isset($course[0]->DiplomaOutlines[0]->content)): echo $course[0]->DiplomaOutlines[0]->content; endif; ?>
                                    </div>
                                </div>                                                
                            </div>
                        </div>
                        
                        
                        <div class="tab-pane fade" id="prod-reviews" role="tabpanel" aria-labelledby="prod-reviews-tab">
                            <div class="content pt-30 pb-30 white-bg">
                                @foreach($testimonial as $testimonia)
                                <div class="cource-review-box mb-30">
                                    <h4>{{$testimonia->title}}</h4>
                                    <div class="rating">
                                        <img  src="{{asset('storage/'.$testimonia->image)}}" style="height:250px;width:100%;" alt="">
                                        
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="prod-feedback" role="tabpanel" aria-labelledby="prod-reviews-tab">
                            <div class="content pt-30 pb-30 white-bg">
                                @foreach($feedback as $feed)
                                <div class="cource-review-box mb-30">
                                    <div class="rating">
                                    <iframe width="100%" height="315" src="{{$feed->feedback}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>       
                                @endforeach                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Video Column -->
            <div class="video-column col-lg-6">
                <div class="inner-column">
                <!-- Video Box -->
                
                    <!-- End Video Box -->
                    <div class="course-features-info">
                        <h3 class="text-center  p-3">Apply Now</h3>
                        <div class="border p-2 my-2">
                            <img src="{{asset('storage/'.$course[0]->image)}}" class="w-100" alt="">
                        </div>
                        <form id="ApplyForm">
                            <div class="alterSuccess">

                            </div>
                            <div class="alterError">

                            </div>
                            <div id="ring_apply" class="ring">Loading
                               <span></span>
                            </div>
                            <input type="hidden" value="{{$course[0]->id}}" id="course_id" class="form-control" name="course_id" />
                            <div class="form-group mb-3">
                                <label for="name">Full Name</label>
                                <input type="text" value="{{old('name')}}" id="name" class="form-control" name="name" />
                            </div>
                            <div class="form-group mb-3">
                                <label for="Phone">Phone / WhatsApp</label>
                                <input type="text" value="{{old('phone')}}" id="phone" class="form-control" name="phone" />
                            </div>
                            <div class="form-group">
                                <label for="email mb-3">Email</label>
                                <input type="text" value="{{old('email')}}" id="email" class="form-control" name="email" />
                            </div>
                            <div class="form-group mb-3">
                                <label for="Phone">Faculty</label>
                                <input type="text" value="{{old('faculty')}}" id="faculty" class="form-control" name="faculty" />
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-success btn-block">Apply Now</button>
                            </div>
                            <h3 class="text-center btn-primary p-3 ">Contact Us 01122455867</h3>

                        </form>
                    </div>
                    
                    
                </div>
            </div>                        
        </div>                
    </div>
</section>
<!-- End intro Courses -->
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
        $('.alterSuccess').html(" ");
        $('.alterSuccess').append(opSuccess);
        }
      },
      error:function(error3){
        if(error3){
            if(error3.responseJSON.errors.email){
                opError+='<div class="alert alert-danger">'+error3.responseJSON.errors.email+'</div>';
            }
            if(error3.responseJSON.errors.faculty){
                opError+='<div class="alert alert-danger">'+error3.responseJSON.errors.faculty+'</div>';
            }
            if(error3.responseJSON.errors.name){
                opError+='<div class="alert alert-danger">'+error3.responseJSON.errors.name+'</div>';
            }
            if(error3.responseJSON.errors.phone){
                opError+='<div class="alert alert-danger">'+error3.responseJSON.errors.phone+'</div>';
            }
            $('.alterSuccess').html(" ");
            $('.alterSuccess').append(opError);
        }
      },
      beforeSend: function() { $('#ring_apply').show(); },
      complete: function() { $('#ring_apply').hide(); }
      });
    });
</script>