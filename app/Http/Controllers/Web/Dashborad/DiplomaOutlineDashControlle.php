<?php

namespace App\Http\Controllers\Web\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DiplomaOutline;
use App\Models\Course;
use App\Models\Testimonial;
use App\Models\Feedback;
class DiplomaOutlineDashControlle extends Controller
{
    function __construct()
    {
         $this->middleware('permission:diplomaoutline-list|diplomaoutline-create|diplomaoutline-edit|diplomaoutline-delete', ['only' => ['index','show']]);
         $this->middleware('permission:diplomaoutline-create', ['only' => ['create','store']]);
         $this->middleware('permission:diplomaoutline-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:diplomaoutline-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diplomaoutline=DiplomaOutline::with('courses')->paginate(6);
        return view('web.dashborad.DiplomaOutline.index',compact('diplomaoutline'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course=Course::all();
        return view('web.dashborad.DiplomaOutline.create',compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'content'       =>'required|min:3|max:100000',
            'level'         =>'required|min:3|max:150',
            'course_id'       =>'required'
        ]);
        $diplomaoutline=DiplomaOutline::create($request->all());
        return back()->with('success','date added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course=Course::with('DiplomaOutlines')->where('id',$id)->get();
        $testimonial=Testimonial::all();
        $feedback=Feedback::all();
        return view('web.dashborad.DiplomaOutline.show',compact('course','testimonial','feedback'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(DiplomaOutline $diplomaoutline)
    {
        $course=Course::all();
        return view('web.dashborad.DiplomaOutline.edit',compact('diplomaoutline','course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,DiplomaOutline $diplomaoutline)
    {
        $request->validate([
            'content'       =>'required|min:3|max:100000',
            'level'         =>'required|min:3|max:150',
            'course_id'       =>'required'
        ]);
        $diplomaoutline->update($request->except('token'));
        return back()->with('success','date updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiplomaOutline $diplomaoutline)
    {
        $diplomaoutline->delete();
        return back()->with('success','date deleted successfully');
    }
}
