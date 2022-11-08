<!DOCTYPE html>
<html lang="en">
@include('web.front.layout.head')
<style>
.ring
{
  position:absolute;
  top:50%;
  left:50%;
  transform:translate(-50%,-50%);
  width:50px;
  height:50px;
  background:transparent;
  border:3px solid #3c3c3c;
  border-radius:50%;
  text-align:center;
  line-height:150px;
  font-family:sans-serif;
  font-size:20px;
  color:#fff000;
  letter-spacing:4px;
  text-transform:uppercase;
  text-shadow:0 0 10px #fff000;
  box-shadow:0 0 20px rgba(0,0,0,.5);
  z-index: 5;
  display:none;
}
.ring:before
{
  content:'';
  position:absolute;
  top:-3px;
  left:-3px;
  width:100%;
  height:100%;
  border:3px solid transparent;
  border-top:3px solid #fff000;
  border-right:3px solid #fff000;
  border-radius:50%;
  animation:animateC 2s linear infinite;
}
.ring>span
{
  display:block;
  position:absolute;
  top:calc(50% - 2px);
  left:50%;
  width:50%;
  height:4px;
  background:transparent;
  transform-origin:left;
  animation:animate 2s linear infinite;
}
.ring>span:before
{
  content:'';
  position:absolute;
  width:16px;
  height:16px;
  border-radius:50%;
  background:#fff000;
  top:-6px;
  right:-8px;
  box-shadow:0 0 20px #fff000;
}
@keyframes animateC
{
  0%
  {
    transform:rotate(0deg);
  }
  100%
  {
    transform:rotate(360deg);
  }
}
@keyframes animate
{
  0%
  {
    transform:rotate(45deg);
  }
  100%
  {
    transform:rotate(405deg);
  }
}
</style>
<body>
<?php 
    use App\Models\Media; $media=Media::first();
    use App\Models\Category; $category=Category::all();
  ?>
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark">
        <div class="row py-2 px-lg-5">
            <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center text-white">
                    <small><i class="fa fa-phone-alt mr-2"></i>@if(isset($media->phone)) {{$media->phone}} @endif</small>
                    <small class="px-3">|</small>
                    <small><i class="fa fa-envelope mr-2"></i>@if(isset($media->email)) {{$media->email}} @endif</small>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-white px-2" href="@if(isset($media->facebook)) {{$media->facebook}} @endif">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-white px-2" href="@if(isset($media->twitter)) {{$media->twitter}} @endif">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-white px-2" href="@if(isset($media->linkedin)) {{$media->linkedin}} @endif">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-white px-2" href="@if(isset($media->instagram)) {{$media->instagram}} @endif">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-white pl-2" href="@if(isset($media->youtube)) {{$media->youtube}} @endif">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->
@include('web.front.layout.header')
@yield('header-start')
@yield('content')
@include('web.front.layout.footer')
@yield('ajax')
</body>

</html>