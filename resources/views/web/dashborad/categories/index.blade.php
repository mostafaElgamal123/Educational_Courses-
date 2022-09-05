@extends('web.dashborad.master')


@section('title','categories')

@section('breadcrumb','categories')

@section('content')


<a href="{{url('/categories/create')}}" class="btn btn-primary">
    add category
</a>

<div class="table-responsive pt-4 pb-4">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">instructors</th>
            <th scope="col">courses</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($category as $cate)
            <tr>
                <th scope="row" class="align-middle">{{$loop->iteration}}</th>
                <td class="align-middle">{{$cate->name}}</td>
                <td class="align-middle">
                    <div class="d-flex flex-row flex-wrap w-100">
                        @foreach($cate->instructors as $key=>$value)
                        <span class="btn btn-success w-40 m-2">{{$value->name}}</span>
                        @endforeach
                    </div>
                </td>
                <td class="align-middle">
                    <div class="d-flex flex-row flex-wrap w-100">
                        @foreach($cate->courses as $key=>$value)
                        <span class="btn btn-success w-40 m-2">{{$value->title}}</span>
                        @endforeach
                    </div>
                </td>
                <td class="align-middle"><a href="{{url('/categories/'.$cate->id."/edit")}}" class="btn btn-info"><i class="fas fa-edit"></i> edit</a></td>
                <td class="align-middle">
                    <form action="{{url('/categories/'.$cate->id)}}" method="post">
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
        {{ $category->links('web.dashborad.pagination.custom') }}
    </div>
</div>
@endsection