<?php use Illuminate\Support\Str; ?>

@extends('web.dashborad.master')


@section('title','Courses')

@section('breadcrumb','Courses')

@section('content')



<a href="{{url('/courses/create')}}" class="btn btn-primary">
    add Courses
</a>
<div class="table-responsive pt-4 pb-4">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">image</th>
                <th scope="col">title</th>
                <th scope="col">rating</th>
                <th scope="col">lectures</th>
                <th scope="col">Apply Student</th>
                <th scope="col">duration</th>
                <th scope="col">Skill_level</th>
                <th scope="col">language</th>
                <th scope="col">discount</th>
                <th scope="col">Diploma Outline</th>
                <th scope="col">category</th>
                <th scope="col">instructor</th>
                <th scope="col">status</th>
                <th scope="col">show</th>
                <th scope="col">edit</th>
                <th scope="col">delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($course as $cour)
                <tr>
                    <th scope="row" class="align-middle">{{$loop->iteration}}</th>
                    <td class="align-middle"><img style="width:60px;height:60px;border-radius:50%;" src="{{url('/Images/course/'.$cour->image)}}" alt=""></td>
                    <td class="align-middle">{{$cour->title}}</td>
                    <td class="align-middle">{{$cour->rating}}</td>
                    <td class="align-middle">{{$cour->lectures}}</td>
                    <td class="align-middle">
                        <span class="btn btn-warning text-white w-40 m-2">{{$cour->applynows->count()}}</span>
                    </td>
                    <td class="align-middle">{{$cour->duration}} Hrs</td>
                    <td class="align-middle">{{$cour->Skill_level}}</td>
                    <td class="align-middle">{{$cour->language}}</td>
                    <td class="align-middle">{{$cour->discount}}</td>
                    <td class="align-middle">
                    <div class="d-flex flex-row flex-wrap w-100">
                            @foreach($cour->DiplomaOutlines as $key=>$value)
                            <span class="btn btn-secondary w-40 m-2">{{$value->level}}</span>
                            @endforeach
                        </div>
                    </td>
                    <td class="align-middle"><span class="btn btn-secondary w-40 m-2">{{$cour->categories->name}}</span></td>
                    <td class="align-middle"><span class="btn btn-primary w-40 m-2">{{$cour->instructors->name}}</span></td>
                    <td class="align-middle">
                        @if($cour->status=='publish')
                        <span class="btn btn-success w-40 m-2">{{$cour->status}}</span>
                        @else
                        <span class="btn btn-warning w-40 m-2">{{$cour->status}}</span> 
                        @endif
                    </td>
                    <td class="align-middle"><a href="{{url('/courses/'.$cour->id)}}" class="btn btn-primary"><i class="fas fa-folder"></i> show</a></td>
                    <td class="align-middle"><a href="{{url('/courses/'.$cour->id."/edit")}}" class="btn btn-info"><i class="fas fa-edit"></i> edit</a></td>
                    <td class="align-middle">
                        <form action="{{url('/courses/'.$cour->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="row pb-4 pt-2">
    <div class="col-12">
        {{ $course->links('web.dashborad.pagination.custom') }}
    </div>
</div>
@endsection