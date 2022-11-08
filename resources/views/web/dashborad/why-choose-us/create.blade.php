@extends('web.dashborad.master')


@section('title','create')

@section('breadcrumb','create')

@section('content')

<a href="{{url('/whychoose')}}" class="btn btn-info">
    view why choose us
</a>

<div class="row pt-4 pb-4">
    @include('web.dashborad.layout.message')
    <div class="col-xl-8 col-12">
        <form action="{{url('/whychoose')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">title</label>
                <input type="text" name="title" value="{{old('title')}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">slug</label>
                <input type="text" name="slug" value="{{old('slug')}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">description</label>
                <textarea name="description" id="mytextarea" class="form-control" cols="30" rows="10">{{old('description')}}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">image</label>
                <input type="file" name="image" value="{{old('image')}}" class="form-control">
            </div>
            <div class="mb-3">
                <h1>Skilled Instructors</h1>
            </div>
            <div class="mb-3">
                <label class="form-label">icon</label>
                <input type="text" name="icon_1" value="{{old('icon_1')}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">title</label>
                <input type="text" name="Skilled_Instructors_title" value="{{old('Skilled_Instructors_title')}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">description</label>
                <input type="text" name="Skilled_Instructors_description" value="{{old('Skilled_Instructors_description')}}" class="form-control">
            </div>
            <div class="mb-3">
                <h1>International Certificate</h1>
            </div>
            <div class="mb-3">
                <label class="form-label">icon</label>
                <input type="text" name="icon_2" value="{{old('icon_2')}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">title</label>
                <input type="text" name="International_Certificate_title" value="{{old('International_Certificate_title')}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">description</label>
                <input type="text" name="International_Certificate_description" value="{{old('International_Certificate_description')}}" class="form-control">
            </div>
            <div class="mb-3">
                <h1>Online Classes</h1>
            </div>
            <div class="mb-3">
                <label class="form-label">icon</label>
                <input type="text" name="icon_3" value="{{old('icon_3')}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">title</label>
                <input type="text" name="Online_Classes_title" value="{{old('Online_Classes_title')}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">description</label>
                <input type="text" name="Online_Classes_description" value="{{old('Online_Classes_description')}}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">create</button>
        </form>
    </div>
</div>

@endsection