<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\WhyChooseUs;
use App\Models\Instructor;
use App\Models\Testimonial;
use App\Models\Course;
use App\Models\Category;
class HomeControlle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about=About::first();
        $whychooseus=WhyChooseUs::first();
        $instructor=Instructor::where('status','publish')->with('categories')->get();
        $testimonial=Testimonial::where('status','publish')->get();
        $course=Course::where('status','publish')->with('instructors')->paginate(6);
        return view('web.front.home.index',compact('about','whychooseus','instructor','testimonial','course'));
    }

}
