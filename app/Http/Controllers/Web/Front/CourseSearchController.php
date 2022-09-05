<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
class CourseSearchController extends Controller
{
    public function SearchCourse(Request $request){
        $search=$request->input('search');
        $course=Course::query()
        ->where('title', 'LIKE', "%{$search}%")
        ->orWhere('description', 'LIKE', "%{$search}%")
        ->paginate(6);
        return view('web.front.search.search',compact('course'));
    }
}
