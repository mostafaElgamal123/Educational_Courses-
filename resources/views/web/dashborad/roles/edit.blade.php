@extends('web.dashborad.master')


@section('title','roles')

@section('breadcrumb','edit')

@section('content')

<a href="{{route('roles.index')}}" class="btn btn-info">
    view roles
</a>



{!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
<div class="row pb-4">
     @include('web.dashborad.layout.message')
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group mt-2">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="row g-2">
        <div class="col-12"><strong>Permission:</strong></div>
            <br/>
            @foreach($permission as $value)
                <div class="col-xl-3 col-md-4 col-sm-6 col-12">{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                {{ $value->name }}</div>
            <br/>
            @endforeach
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-start mt-4">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}

@endsection