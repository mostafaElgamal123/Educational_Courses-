<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
class CategoryControlle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $category=Category::where('slug',$slug)->first();
        $course_recent=Course::with('instructors')->where('status','publish')->orderby('created_at', 'DESC')->take(5)->get();
        $course=Course::with('instructors')->where('category_id',$category->id)->paginate(6);
        $category=Category::with('courses')->whereHas('courses')->get();
        return view('web.front.category.category',compact('course_recent','course','category'));
    }

}
