<?php use App\Models\Media; $media=Media::first(); ?>
<!-- Contact Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-5 mb-lg-0">
                <div class="bg-light d-flex flex-column justify-content-center px-5" style="height: 450px;">
                    <div class="d-flex align-items-center mb-5">
                        <div class="btn-icon bg-primary mr-4">
                            <i class="fa fa-2x fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="mt-n1">
                            <h4>Our Location</h4>
                            <p class="m-0">@if(isset($media->location)) {{$media->location}} @endif</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-5">
                        <div class="btn-icon bg-secondary mr-4">
                            <i class="fa fa-2x fa-phone-alt text-white"></i>
                        </div>
                        <div class="mt-n1">
                            <h4>Call Us</h4>
                            <p class="m-0">@if(isset($media->phone)) {{$media->phone}} @endif</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="btn-icon bg-warning mr-4">
                            <i class="fa fa-2x fa-envelope text-white"></i>
                        </div>
                        <div class="mt-n1">
                            <h4>Email Us</h4>
                            <p class="m-0">@if(isset($media->email)) {{$media->email}} @endif</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="section-title position-relative mb-4">
                    <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Need Help?</h6>
                    <h1 class="display-4">Send Us A Message</h1>
                </div>
                <div class="contact-form">
                    <div class="alterSuccess">

                    </div>
                    <div id="ring_contact" class="ring">Loading
                       <span></span>
                    </div>
                    <form id="SubmitFormhome">
                        <div class="row">
                            <div class="col-6 form-group">
                                <input type="text" value="{{old('name')}}"  id="name"  class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Your Name" required="required">
                            </div>
                            <div class="col-6 form-group">
                                <input type="email" value="{{old('email')}}" id="email" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Your Email" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" value="{{old('subject')}}" id="subject" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Subject" required="required">
                        </div>
                        <div class="form-group">
                            <textarea id="message" class="form-control border-top-0 border-right-0 border-left-0 p-0" rows="5" placeholder="Message" required="required">{{old('message')}}</textarea>
                        </div>
                        <div>
                            <button class="btn btn-primary py-3 px-5" type="submit">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
<script>
  $('#SubmitFormhome').on('submit',function(e){
    e.preventDefault();

    let name = $('#name').val();
    let email = $('#email').val();
    let subject = $('#subject').val();
    let message = $('#message').val();
    var opSuccess=" ";
    var opError=" ";
    $.ajax({
      url: "{{url('contacts')}}",
      type:"post",
      data:{
        "_token": "{{ csrf_token() }}",
        name:name,
        email:email,
        subject:subject,
        message:message,
      },
      success:function(response){
        if(response){
          $("#SubmitFormhome")[0].reset(); 
          //console.log(data.length);
        opSuccess+='<div class="alert alert-success">'+response.success+'</div>';
        $('.alterSuccess').html(" ");
        $('.alterSuccess').append(opSuccess);
        }
      },
      error:function(error1){
        if(error1){
            if(error1.responseJSON.errors.name){
                opError+='<div class="alert alert-danger">'+error1.responseJSON.errors.name+'</div>';
            }
            if(error1.responseJSON.errors.email){
                opError+='<div class="alert alert-danger">'+error1.responseJSON.errors.email+'</div>';
            }
            if(error1.responseJSON.errors.subject){
                opError+='<div class="alert alert-danger">'+error1.responseJSON.errors.subject+'</div>';
            }
            if(error1.responseJSON.errors.message){
                opError+='<div class="alert alert-danger">'+error1.responseJSON.errors.message+'</div>';
            }
            $('.alterSuccess').html(" ");
            $('.alterSuccess').append(opError);
        }
      },
      beforeSend: function() { $('#ring_contact').show(); },
      complete: function() { $('#ring_contact').hide(); }
      });
    });
</script>