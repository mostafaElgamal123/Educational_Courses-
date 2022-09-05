@extends('web.dashborad.master')


@section('title','roles')

@section('breadcrumb','create')

@section('content')

<a href="{{route('roles.index')}}" class="btn btn-info">
    view roles
</a>
{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
<div class="row pt-4 pb-4">
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
            @foreach($permission as $value)
                <div class="col-xl-3 col-md-4 col-sm-6 col-12">{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                {{ $value->name }}</div>
            @endforeach
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-start mt-4">
        <button type="submit" class="btn btn-primary">add permission</button>
    </div>
</div>
{!! Form::close() !!}



@endsection