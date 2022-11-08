@extends('web.dashborad.master')


@section('title','roles')

@section('breadcrumb','roles')

@section('content')


@can('role-create')
<a href="{{route('roles.create')}}" class="btn btn-primary">
    add role
</a>
@endcan

<div class="table-responsive pt-4 pb-4">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">edit</th>
                <th scope="col">delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $key => $role)
                <tr id="{{$role->id}}">
                    <th scope="row" class="align-middle">{{$loop->iteration}}</th>
                    <td class="align-middle">{{$role->name}}</td>
                    <td class="align-middle">
                    @can('role-edit')
                        <a href="{{ route('roles.edit',$role->id) }}" class="btn btn-info"><i class="fas fa-edit"></i> edit</a>
                        @endcan
                    </td>
                    <td class="align-middle">
                        @can('role-delete')
                        <button class="btn btn-danger deleteRecord" data-id="{{ $role->id }}"><i class="fa fa-trash" aria-hidden="true"></i> delete</button>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="row pb-4 pt-2">
    <div class="col-12">
        {{ $roles->links('web.dashborad.pagination.custom') }}
    </div>
</div>
@endsection

@section('script')
<script>
    $('.deleteRecord').on('click',function(){
        const rowid=$(this).attr('data-id');
        $.ajax({
            url: "http://127.0.0.1:8000/roles/"+rowid,
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