@extends('web.dashborad.master')


@section('title','feedback')

@section('breadcrumb','feedback')

@section('content')


<a href="{{url('/feedbackS/create')}}" class="btn btn-primary">
    add feedback
</a>

<div class="table-responsive pt-4 pb-4">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">feedback</th>
            <th scope="col">status</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($feedback as $feed)
            <tr>
                <th scope="row" class="align-middle">{{$loop->iteration}}</th>
                <td class="align-middle">{{$feed->feedback}}</td>
                <td class="align-middle">
                        @if($feed->status=='publish')
                        <span class="btn btn-success w-40 m-2">{{$feed->status}}</span>
                        @else
                        <span class="btn btn-warning w-40 m-2">{{$feed->status}}</span> 
                        @endif
                    </td>
                <td class="align-middle"><a href="{{url('/feedbackS/'.$feed->id."/edit")}}" class="btn btn-info"><i class="fas fa-edit"></i> edit</a></td>
                <td class="align-middle">
                    <form action="{{url('/feedbackS/'.$feed->id)}}" method="post">
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
        {{ $feedback->links('web.dashborad.pagination.custom') }}
    </div>
</div>
@endsection