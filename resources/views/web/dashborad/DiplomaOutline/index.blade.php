@extends('web.dashborad.master')


@section('title','Diploma Outlines')

@section('breadcrumb','Diploma Outlines')

@section('content')


<a href="{{url('/diplomaoutlines/create')}}" class="btn btn-primary">
    add Diploma Outlines
</a>

<div class="table-responsive pt-4 pb-4">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">level</th>
            <th scope="col">courses</th>
            <th scope="col">show</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($diplomaoutline as $diplomaoutli)
            <tr>
                <th scope="row" class="align-middle">{{$loop->iteration}}</th>
                <th scope="row" class="align-middle">{{$diplomaoutli->level}}</th>
                <td class="align-middle">
                        <span class="btn btn-success w-40 m-2">{{$diplomaoutli->courses->title}}</span>
                </td>
                <td class="align-middle"><a href="{{url('/diplomaoutlines/'.$diplomaoutli->id)}}" class="btn btn-primary"><i class="fas fa-folder"></i> show</a></td>
                <td class="align-middle"><a href="{{url('/diplomaoutlines/'.$diplomaoutli->id."/edit")}}" class="btn btn-info"><i class="fas fa-edit"></i> edit</a></td>
                <td class="align-middle">
                    <form action="{{url('/diplomaoutlines/'.$diplomaoutli->id)}}" method="post">
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
        {{ $diplomaoutline->links('web.dashborad.pagination.custom') }}
    </div>
</div>
@endsection