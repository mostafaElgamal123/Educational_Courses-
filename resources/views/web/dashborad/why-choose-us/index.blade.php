<?php use Illuminate\Support\Str; ?>
@extends('web.dashborad.master')


@section('title','whychooseus')

@section('breadcrumb','whychooseus')

@section('content')



<?php if($whychoose->count() <= 0): ?>
<a href="{{url('/whychoose/create')}}" class="btn btn-primary">
    add why choose us
</a>
<?php
endif;
?>
<div class="table-responsive pt-4 pb-4">
    <table class="table table-bordered" style="width: max-content;">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">image</th>
            <th scope="col">title</th>
            <th scope="col">slug</th>
            <th scope="col">Skilled Instructors icon</th>
            <th scope="col">Skilled Instructors title</th>
            <th scope="col">International Certificate icon</th>
            <th scope="col">International Certificate title</th>
            <th scope="col">Online Classes icon</th>
            <th scope="col">Online Classes title</th>
            <th scope="col">show</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($whychoose as $whycho)
            <tr id="{{$whycho->id}}">
                <th scope="row" class="align-middle">{{$loop->iteration}}</th>
                <td class="align-middle"><img style="width:60px;height:60px;border-radius:50%;" src="{{asset('storage/'.$whycho->image)}}" alt=""></td>
                <td class="align-middle">{{$whycho->title}}</td>
                <td class="align-middle">{{$whycho->slug}}</td>
                <td class="align-middle">{{$whycho->icon_1}}</td>
                <td class="align-middle">{{$whycho->Skilled_Instructors_title}}</td>
                <td class="align-middle">{{$whycho->icon_2}}</td>
                <td class="align-middle">{{$whycho->International_Certificate_title}}</td>
                <td class="align-middle">{{$whycho->icon_3}}</td>
                <td class="align-middle">{{$whycho->Online_Classes_title}}</td>
                <td class="align-middle"><a href="{{url('/whychoose/'.$whycho->slug)}}" class="btn btn-primary"><i class="fas fa-folder"></i> show</a></td>
                <td class="align-middle"><a href="{{url('/whychoose/'.$whycho->slug."/edit")}}" class="btn btn-info"><i class="fas fa-edit"></i> edit</a></td>
                <td class="align-middle">
                <button class="btn btn-danger deleteRecord" data-id="{{ $whycho->slug }}"><i class="fa fa-trash" aria-hidden="true"></i> delete</button>
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
            url: "http://127.0.0.1:8000/whychoose/"+rowslug,
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