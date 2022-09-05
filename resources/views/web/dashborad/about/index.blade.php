<?php use Illuminate\Support\Str; ?>
@extends('web.dashborad.master')


@section('title','about')

@section('breadcrumb','about')

@section('content')



<?php if($about->count() <= 0): ?>
<a href="{{url('/abouts/create')}}" class="btn btn-primary">
    add about
</a>
<?php
endif;
?>
<div class="table-responsive pt-4 pb-4">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">image</th>
            <th scope="col">title</th>
            <th scope="col">available subject</th>
            <th scope="col">online courses</th>
            <th scope="col">skilled instructors</th>
            <th scope="col">happy students</th>
            <th scope="col">show</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($about as $abou)
            <tr>
                <th scope="row" class="align-middle">{{$loop->iteration}}</th>
                <td class="align-middle"><img style="width:60px;height:60px;border-radius:50%;" src="{{url('/Images/about/'.$abou->image)}}" alt=""></td>
                <td class="align-middle">{{$abou->title}}</td>
                <td class="align-middle">{{$abou->available_subject}}</td>
                <td class="align-middle">{{$abou->online_courses}}</td>
                <td class="align-middle">{{$abou->skilled_instructors}}</td>
                <td class="align-middle">{{$abou->happy_students}}</td>
                <td class="align-middle"><a href="{{url('/abouts/'.$abou->id)}}" class="btn btn-primary"><i class="fas fa-folder"></i> show</a></td>
                <td class="align-middle"><a href="{{url('/abouts/'.$abou->id."/edit")}}" class="btn btn-info"><i class="fas fa-edit"></i> edit</a></td>
                <td class="align-middle">
                    <form action="{{url('/abouts/'.$abou->id)}}" method="post">
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
@endsection