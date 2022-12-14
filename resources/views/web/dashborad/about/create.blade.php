@extends('web.dashborad.master')


@section('title','create')

@section('breadcrumb','create')

@section('content')

<a href="{{url('/abouts')}}" class="btn btn-info">
    view about
</a>

<div class="row pt-4 pb-4">
    @include('web.dashborad.layout.message')
    <div class="col-xl-8 col-12">
        <form action="{{url('/abouts')}}" method="post" enctype="multipart/form-data">
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
                <label class="form-label">available subject</label>
                <input type="number" name="available_subject" value="{{old('available_subject')}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">online courses</label>
                <input type="number" name="online_courses" value="{{old('online_courses')}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">skilled instructors</label>
                <input type="number" name="skilled_instructors" value="{{old('skilled_instructors')}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">happy students</label>
                <input type="number" name="happy_students" value="{{old('happy_students')}}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">create</button>
        </form>
    </div>
</div>

@endsection