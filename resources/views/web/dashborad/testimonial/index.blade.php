@extends('web.dashborad.master')


@section('title','testimonial')

@section('breadcrumb','testimonial')

@section('content')


<a href="{{url('/testimonials/create')}}" class="btn btn-primary">
    add testimonial
</a>

<div class="table-responsive pt-4 pb-4">
    <table class="table table-bordered ">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">image</th>
            <th scope="col">title</th>
            <th scope="col">slug</th>
            <th scope="col">description</th>
            <th scope="col">status</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($testimonial as $testimonia)
            <tr id="{{$testimonia->id}}">
                <th scope="row" class="align-middle">{{$loop->iteration}}</th>
                <td class="align-middle"><img style="width:60px;height:60px;border-radius:50%;" src="{{asset('storage/'.$testimonia->image)}}" alt=""></td>
                <td class="align-middle">{{$testimonia->title}}</td>
                <td class="align-middle">{{$testimonia->slug}}</td>
                <td class="align-middle">
                <?php $content_1=substr($testimonia->description,0,50);
                    echo $content_1."...";
                  ?>
                </td>
                <td class="align-middle">
                    @if($testimonia->status=='publish')
                      <span class="btn btn-success w-40 m-2">{{$testimonia->status}}</span>
                    @else
                      <span class="btn btn-warning w-40 m-2">{{$testimonia->status}}</span> 
                    @endif
                </td>
                <td class="align-middle"><a href="{{url('/testimonials/'.$testimonia->slug."/edit")}}" class="btn btn-info"><i class="fas fa-edit"></i> edit</a></td>
                <td class="align-middle">
                <button class="btn btn-danger deleteRecord" data-id="{{ $testimonia->slug }}"><i class="fa fa-trash" aria-hidden="true"></i> delete</button>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
<div class="row pb-4 pt-2">
    <div class="col-12">
        {{ $testimonial->links('web.dashborad.pagination.custom') }}
    </div>
</div>
@endsection

@section('script')
<script>
    $('.deleteRecord').on('click',function(){
        const rowslug=$(this).attr('data-id');
        $.ajax({
            url: "http://127.0.0.1:8000/testimonials/"+rowslug,
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