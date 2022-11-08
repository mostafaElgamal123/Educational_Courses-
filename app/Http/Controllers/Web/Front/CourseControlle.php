<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
class CourseControlle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course=Course::where('status','publish')->with('instructors')->paginate(6);
        return view('web.front.courses.index',compact('course'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $course=Course::with('instructors')->where('slug',$slug)->first();
        $course_recent=Course::with('instructors')->where('status','publish')->orderby('created_at', 'DESC')->take(5)->get();
        $related_course=Course::with('instructors')->where('category_id',$course->category_id)->get();
        $category=Category::with('courses')->whereHas('courses')->get();
        return view('web.front.single.single',compact('course','course_recent','related_course','category'));
    }
}
