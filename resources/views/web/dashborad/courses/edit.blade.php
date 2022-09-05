@extends('web.dashborad.master')


@section('title','create')

@section('breadcrumb','create')

@section('content')

<a href="{{url('/courses')}}" class="btn btn-info">
    view courses
</a>

<div class="row pt-4 pb-4">
    @include('web.dashborad.layout.message')
    <div class="col-xl-8 col-12">
        <form action="{{url('/courses/'.$course->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label class="form-label">title</label>
                <input type="text" name="title" value="{{$course->title}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">description</label>
                <textarea name="description" id="mytextarea" class="form-control" cols="30" rows="10">{{$course->description}}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">rating</label>
                <input type="text" name="rating" value="{{$course->rating}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">lectures</label>
                <input type="text" name="lectures" value="{{$course->lectures}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">duration</label>
                <input type="text" name="duration" value="{{$course->duration}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Skill_level</label>
                <input type="text" name="Skill_level" value="{{$course->Skill_level}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">language</label>
                <input type="text" name="language" value="{{$course->language}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">discount</label>
                <input type="text" name="discount" value="{{$course->discount}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">image</label>
                <input type="file" name="image" value="{{$course->image}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">category</label>
                <select name="category_id" value="{{old('category_id')}}" class="form-select coursecategory">
                    <option value="0" disabled="true" selected="true">-Select-</option>
                    @foreach($category as $cate)
                    <option value="{{$cate->id}}">{{$cate->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">instructor</label>
                <select name="instructor_id" value="{{old('instructor_id')}}" class="form-select courseinstructor">
                    
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">status</label>
                <select name="status" value="{{$course->status}}" class="form-select">
                    <option selected>publish</option>
                    <option value="draft">draft</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>
</div>

@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
	$(document).ready(function(){

		$(document).on('change','.coursecategory',function(){

			var cat_id=$(this).val();
			//console.log(cat_id);
			var div=$(this).parent();
			var op=" ";
            //console.log(op);
			$.ajax({
				url: "{{url('findinstructor')}}",
                type:"get",
				data:{'id':cat_id},
				success:function(data){
					//console.log('success');

					//console.log(data);

					//console.log(data.length);
					op+='<option value="0" selected disabled>chose product</option>';
					for(var i=0;i<data.length;i++){
					op+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
				   }

				   $('.courseinstructor').html(" ");
				   $('.courseinstructor').append(op);
				},
				error:function(){

				}
			});
		});

	});
</script>


@endsection