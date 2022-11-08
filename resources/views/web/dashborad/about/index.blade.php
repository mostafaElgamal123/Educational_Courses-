<?php use Illuminate\Support\Str; ?>
@extends('web.dashborad.master')


@section('title','about')

@section('breadcrumb','about')

@section('content')



<?php if($about->count() <= 0): ?>
<a href="{{url('/abouts/create')}}" class="btn btn-primary">
    add about
</a>
<?php
endif;
?>
<div class="table-responsive pt-4 pb-4">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">image</th>
            <th scope="col">title</th>
            <th scope="col">slug</th>
            <th scope="col">available subject</th>
            <th scope="col">online courses</th>
            <th scope="col">skilled instructors</th>
            <th scope="col">happy students</th>
            <th scope="col">show</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($about as $abou)
            <tr id="{{$abou->id}}">
                <th scope="row" class="align-middle">{{$loop->iteration}}</th>
                <td class="align-middle"><img style="width:60px;height:60px;border-radius:50%;" src="{{asset('storage/'.$abou->image)}}" alt=""></td>
                <td class="align-middle">{{$abou->title}}</td>
                <td class="align-middle">{{$abou->slug}}</td>
                <td class="align-middle">{{$abou->available_subject}}</td>
                <td class="align-middle">{{$abou->online_courses}}</td>
                <td class="align-middle">{{$abou->skilled_instructors}}</td>
                <td class="align-middle">{{$abou->happy_students}}</td>
                <td class="align-middle"><a href="{{url('/abouts/'.$abou->slug)}}" class="btn btn-primary"><i class="fas fa-folder"></i> show</a></td>
                <td class="align-middle"><a href="{{url('/abouts/'.$abou->slug."/edit")}}" class="btn btn-info"><i class="fas fa-edit"></i> edit</a></td>
                <td class="align-middle">
                <button class="btn btn-danger deleteRecord" data-id="{{ $abou->slug }}"><i class="fa fa-trash" aria-hidden="true"></i> delete</button>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection
@section('script')
<script>
    $('.deleteRecord').on('click',function(){
        const rowslug=$(this).attr('data-id');
        $.ajax({
            url: "http://127.0.0.1:8000/abouts/"+rowslug,
            method: 'delete',
            data: {
                "_token": "{{ csrf_token() }}",
                rowslug: rowslug
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