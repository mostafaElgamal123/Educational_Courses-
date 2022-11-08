@extends('web.dashborad.master')


@section('title','instructors')

@section('breadcrumb','instructors')

@section('content')



<a href="{{url('/instructors/create')}}" class="btn btn-primary">
    add instructors
</a>

<div class="table-responsive pt-4 pb-4">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">image</th>
            <th scope="col">name</th>
            <th scope="col">slug</th>
            <th scope="col">email</th>
            <th scope="col">phone</th>
            <th scope="col">address</th>
            <th scope="col">twitter</th>
            <th scope="col">facebook</th>
            <th scope="col">Instagram</th>
            <th scope="col">LinkedIn</th>
            <th scope="col">YouTube</th>
            <th scope="col">category</th>
            <th scope="col">course</th>
            <th scope="col">status</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($instructor as $instr)
            <tr id="{{$instr->id}}">
                <th scope="row" class="align-middle">{{$loop->iteration}}</th>
                <td class="align-middle"><img style="width:60px;height:60px;border-radius:50%;" src="{{asset('storage/'.$instr->image)}}" alt=""></td>
                <td class="align-middle">{{$instr->name}}</td>
                <td class="align-middle">{{$instr->slug}}</td>
                <td class="align-middle">{{$instr->email}}</td>
                <td class="align-middle">{{$instr->phone}}</td>
                <td class="align-middle">{{$instr->address}}</td>
                <td class="align-middle">{{$instr->twitter}}</td>
                <td class="align-middle">{{$instr->facebook}}</td>
                <td class="align-middle">{{$instr->instagram}}</td>
                <td class="align-middle">{{$instr->linkedin}}</td>
                <td class="align-middle">{{$instr->YouTube}}</td>
                <td class="align-middle"><span class="btn btn-secondary w-40 m-2">{{$instr->categories->name}}</span></td>
                <td class="align-middle">
                    <div class="d-flex flex-row flex-wrap w-100">
                        @foreach($instr->courses as $key=>$value)
                        <span class="btn btn-primary w-40 m-2">{{$value->title}}</span>
                        @endforeach
                    </div>
                </td>
                <td class="align-middle">
                    @if($instr->status=='publish')
                      <span class="btn btn-success w-40 m-2">{{$instr->status}}</span>
                    @else
                      <span class="btn btn-warning w-40 m-2">{{$instr->status}}</span> 
                    @endif
                </td>
                <td class="align-middle"><a href="{{url('/instructors/'.$instr->slug."/edit")}}" class="btn btn-info"><i class="fas fa-edit"></i> edit</a></td>
                <td class="align-middle">
                <button class="btn btn-danger deleteRecord" data-id="{{ $instr->slug }}"><i class="fa fa-trash" aria-hidden="true"></i> delete</button>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
<div class="row pb-4 pt-2">
    <div class="col-12">
        {{ $instructor->links('web.dashborad.pagination.custom') }}
    </div>
</div>
@endsection

@section('script')
<script>
    $('.deleteRecord').on('click',function(){
        const rowslug=$(this).attr('data-id');
        $.ajax({
            url: "http://127.0.0.1:8000/instructors/"+rowslug,
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