<!DOCTYPE html>
<html lang="en">
@include('web.front.layout.head')
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