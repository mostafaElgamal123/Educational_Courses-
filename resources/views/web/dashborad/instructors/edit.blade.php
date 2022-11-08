@extends('web.dashborad.master')


@section('title','create')

@section('breadcrumb','create')

@section('content')

<a href="{{url('/instructors')}}" class="btn btn-info">
    view instructors
</a>

<div class="row pt-4 pb-4">
    @include('web.dashborad.layout.message')
    <div class="col-xl-8 col-12">
        <form action="{{url('/instructors/'.$instructor->slug)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label class="form-label">name</label>
                <input type="text" name="name" value="{{$instructor->name}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">slug</label>
                <input type="text" name="slug" value="{{$instructor->slug}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">email</label>
                <input type="email" name="email" value="{{$instructor->email}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">phone</label>
                <input type="text" name="phone" value="{{$instructor->phone}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">address</label>
                <input type="text" name="address" value="{{$instructor->address}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">image</label>
                <input type="file" name="image" value="{{$instructor->image}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Twitter</label>
                <input type="url" name="twitter" value="{{$instructor->twitter}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Facebook</label>
                <input type="url" name="facebook" value="{{$instructor->facebook}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Instagram</label>
                <input type="url" name="instagram" value="{{$instructor->instagram}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">LinkedIn</label>
                <input type="url" name="linkedin" value="{{$instructor->linkedin}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">YouTube</label>
                <input type="url" name="YouTube" value="{{$instructor->YouTube}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">category</label>
                <select name="category_id" value="{{$instructor->category_id}}" class="form-select">
                @foreach($category as $cate)
                    <option value="{{$cate->id}}" @if($cate->id==$instructor->category_id) selected @endif>{{$cate->name}}</option>
                @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">status</label>
                <select name="status" value="{{$instructor->status}}" class="form-select">
                    <option selected>publish</option>
                    <option value="draft">draft</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>
</div>

@endsection