@extends('web.dashborad.master')


@section('title','update')

@section('breadcrumb','update')

@section('content')

<a href="{{url('/whychoose')}}" class="btn btn-info">
    view why choose us
</a>

<div class="row pt-4 pb-4">
    @include('web.dashborad.layout.message')
    <div class="col-xl-8 col-12">
        <form action="{{url('/whychoose/'.$whychoose->slug)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">title</label>
                <input type="text" name="title" value="{{$whychoose->title}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">slug</label>
                <input type="text" name="slug" value="{{$whychoose->slug}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">description</label>
                <textarea name="description" id="mytextarea" class="form-control" cols="30" rows="10">{{$whychoose->description}}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">image</label>
                <input type="file" name="image" value="{{$whychoose->image}}" class="form-control">
            </div>
            <div class="mb-3">
                <h1>Skilled Instructors</h1>
            </div>
            <div class="mb-3">
                <label class="form-label">icon</label>
                <input type="text" name="icon_1" value="{{$whychoose->icon_1}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">title</label>
                <input type="text" name="Skilled_Instructors_title" value="{{$whychoose->Skilled_Instructors_title}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">description</label>
                <input type="text" name="Skilled_Instructors_description" value="{{$whychoose->Skilled_Instructors_description}}" class="form-control">
            </div>
            <div class="mb-3">
                <h1>International Certificate</h1>
            </div>
            <div class="mb-3">
                <label class="form-label">icon</label>
                <input type="text" name="icon_2" value="{{$whychoose->icon_2}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">title</label>
                <input type="text" name="International_Certificate_title" value="{{$whychoose->International_Certificate_title}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">description</label>
                <input type="text" name="International_Certificate_description" value="{{$whychoose->International_Certificate_description}}" class="form-control">
            </div>
            <div class="mb-3">
                <h1>Online Classes</h1>
            </div>
            <div class="mb-3">
                <label class="form-label">icon</label>
                <input type="text" name="icon_3" value="{{$whychoose->icon_3}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">title</label>
                <input type="text" name="Online_Classes_title" value="{{$whychoose->Online_Classes_title}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">description</label>
                <input type="text" name="Online_Classes_description" value="{{$whychoose->Online_Classes_description}}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>
</div>

@endsection