@extends('web.dashborad.master')


@section('title','Apply Nows')

@section('breadcrumb','Apply Nows')

@section('content')
<div class="table-responsive pt-4 pb-4">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">phone</th>
            <th scope="col">email</th>
            <th scope="col">Faculty</th>
            <th scope="col">course</th>
            <th scope="col">delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($applynow as $apply)
            <tr id="{{$apply->id}}">
                <th scope="row" class="align-middle">{{$loop->iteration}}</th>
                <td class="align-middle">{{$apply->name}}</td>
                <td class="align-middle">{{$apply->phone}}</td>
                <td class="align-middle">{{$apply->email}}</td>
                <td class="align-middle">{{$apply->faculty}}</td>
                <td class="align-middle"><span class="btn btn-info w-40 m-2">{{$apply->Courses->title}}</span></td>
                <td class="align-middle">
                <button class="btn btn-danger deleteRecord" data-id="{{ $apply->id }}"><i class="fa fa-trash" aria-hidden="true"></i> delete</button>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
<div class="row pb-4 pt-2">
    <div class="col-12">
        {{ $applynow->links('web.dashborad.pagination.custom') }}
    </div>
</div>
@endsection

@section('script')
<script>
    $('.deleteRecord').on('click',function(){
        const rowid=$(this).attr('data-id');
        $.ajax({
            url: "http://127.0.0.1:8000/applynows/"+rowid,
            method: 'delete',
            data: {
                "_token": "{{ csrf_token() }}",
                rowid: rowid
            },
            success: function(result){
                console.log(result);
                alert(result.success);
                $('#'+result.id).remove();
            }
        });
    })
</script>
@endsection