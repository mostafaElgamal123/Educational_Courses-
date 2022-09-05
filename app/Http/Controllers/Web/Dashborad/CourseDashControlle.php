<?php

namespace App\Http\Controllers\Web\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\Category;
use App\Models\Testimonial;
use App\Models\Feedback;
use App\Http\Requests\Web\Dashborad\CourseRequest;
class CourseDashControlle extends Controller
{
    function __construct()
    {
         $this->middleware('permission:course-list|course-create|course-edit|course-delete', ['only' => ['index','show']]);
         $this->middleware('permission:course-create', ['only' => ['create','store']]);
         $this->middleware('permission:course-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:course-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course=course::with('DiplomaOutlines','instructors','categories')->paginate(6);
        return view('web.dashborad.courses.index',compact('course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $category=Category::all();
        return view('web.dashborad.courses.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CourseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $request->validated();
        $course=Course::create($request->all());
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/Images/course'), $filename);
            $course->image= $filename;
            $course->save();
        }
        return back()->with('success','date added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $testimonial=Testimonial::all();
        $feedback=Feedback::all();
        return view('web.dashborad.courses.show',compact('course','testimonial','feedback'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $category=Category::all();
        return view('web.dashborad.courses.edit',compact('course','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\CourseRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request,Course $course)
    {
        // Retrieve the validated input data...
        $request->validated();
        if($request->has('image')){
            $file1= $request->file('image');
            $filename1= date('YmdHi').$file1->getClientOriginalName();
            $file1-> move(public_path('/Images/course'), $filename1);
            $image_path1 = public_path('/Images/course').'/'.$course->image;
            if(file_exists($image_path1)):
               unlink($image_path1);
            endif;
            $course->update($request->all());
            $course->image= $filename1;
            $course->save();
        }else{
            $course=Course::update($request->all());
        }
        return back()->with('success','date updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $image_path = public_path('/Images/course').'/'.$course->image;
        if(file_exists($image_path)):
            unlink($image_path);
        endif;
        $course->delete();
        return back()->with('success','date deleted successfully');
    }


}
