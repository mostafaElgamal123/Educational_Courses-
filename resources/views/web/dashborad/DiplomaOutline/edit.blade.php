@extends('web.dashborad.master')


@section('title','update')

@section('breadcrumb','update')

@section('content')

<a href="{{url('/diplomaoutlines')}}" class="btn btn-info">
    view Diploma Outlines
</a>

<div class="row pt-4 pb-4">
    @include('web.dashborad.layout.message')
    <div class="col-xl-8 col-12">
        <form action="{{url('/diplomaoutlines/'.$diplomaoutline->slug)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">level</label>
                <input type="text" name="level" value="{{$diplomaoutline->level}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">slug</label>
                <input type="text" name="slug" value="{{$diplomaoutline->slug}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Diploma Outline</label>
                <textarea name="content" id="mytextarea" class="form-control" cols="30" rows="10">{{$diplomaoutline->content}}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">course</label>
                <select name="course_id" value="{{old('course_id')}}" class="form-select">
                    @foreach($course as $cours)
                    <option value="{{$cours->id}}">{{$cours->title}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>
</div>

@endsection