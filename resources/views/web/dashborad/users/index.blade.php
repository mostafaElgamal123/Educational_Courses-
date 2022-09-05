@extends('web.dashborad.master')


@section('title','users')

@section('breadcrumb','users')

@section('content')


<a href="{{route('users.create')}}" class="btn btn-primary">
    add user
</a>



<div class="table-responsive pt-4 pb-4">
  <table class="table table-bordered">
      <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">name</th>
              <th scope="col">Email</th>
              <th scope="col">status</th>
              <th scope="col">Roles</th>
              <th scope="col">edit</th>
              <th scope="col">delete</th>
          </tr>
      </thead>
      <tbody>
      @foreach ($data as $key => $user)
        <tr>
          <td scope="row" class="align-middle">{{$loop->iteration}}</td>
          <td class="align-middle">{{ $user->name }}</td>
          <td class="align-middle">{{ $user->email }}</td>
          <td class="align-middle">
              @if(Cache::has('user-is-online-' . $user->id))
                <span class="btn btn-success w-40 m-2">Online</span>
              @else
                <span class="btn btn-warning w-40 m-2">Offline</span>
              @endif
          </td>
          <td class="align-middle">
            @if(!empty($user->getRoleNames()))
              @foreach($user->getRoleNames() as $v)
                <label class="badge badge-success">{{ $v }}</label>
              @endforeach
            @endif
          </td>
          <td class="align-middle">
            @can('user-edit')
                <a href="{{ route('users.edit',$user->id) }}" class="btn btn-info"><i class="fas fa-edit"></i> edit</a>
                @endcan
          </td>
          <td class="align-middle">
                @can('user-delete')
                <form action="{{route('users.destroy',$user->id)}}" method="post">
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
        {{ $data->links('web.dashborad.pagination.custom') }}
    </div>
</div>
@endsection