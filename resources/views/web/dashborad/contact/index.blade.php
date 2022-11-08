@extends('web.dashborad.master')


@section('title','contact')

@section('breadcrumb','contact message')

@section('content')
<div class="table-responsive pt-4 pb-4">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">email</th>
            <th scope="col">subject</th>
            <th scope="col">message</th>
            <th scope="col">delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contact as $contac)
            <tr id="{{$contac->id}}">
                <th scope="row" class="align-middle">{{$loop->iteration}}</th>
                <td class="align-middle">{{$contac->name}}</td>
                <td class="align-middle">{{$contac->email}}</td>
                <td class="align-middle">{{$contac->subject}}</td>
                <td class="align-middle">{{$contac->message}}</td>
                <td class="align-middle">
                <button class="btn btn-danger deleteRecord" data-id="{{ $contac->id }}"><i class="fa fa-trash" aria-hidden="true"></i> delete</button>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
<div class="row pb-4 pt-2">
    <div class="col-12">
        {{ $contact->links('web.dashborad.pagination.custom') }}
    </div>
</div>
@endsection
@section('script')
<script>
    $('.deleteRecord').on('click',function(){
        const rowid=$(this).attr('data-id');
        $.ajax({
            url: "http://127.0.0.1:8000/contacts/"+rowid,
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