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
                <tr>
                    <th scope="row" class="align-middle">{{$loop->iteration}}</th>
                    <td class="align-middle">{{$role->name}}</td>
                    <td class="align-middle">
                    @can('role-edit')
                        <a href="{{ route('roles.edit',$role->id) }}" class="btn btn-info"><i class="fas fa-edit"></i> edit</a>
                        @endcan
                    </td>
                    <td class="align-middle">
                        @can('role-delete')
                        <form action="{{route('roles.destroy',$role->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> delete</button>
                        </form>
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