<?php

namespace App\Http\Controllers\Web\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Instructor;
use App\Models\Category;
use App\Http\Requests\Web\Dashborad\InstructorRequest;
class InstructorDashControlle extends Controller
{
    function __construct()
    {
         $this->middleware('permission:instructor-list|instructor-create|instructor-edit|instructor-delete', ['only' => ['index','show']]);
         $this->middleware('permission:instructor-create', ['only' => ['create','store']]);
         $this->middleware('permission:instructor-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:instructor-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructor=Instructor::with('categories','courses')->paginate(6);
        return view('web.dashborad.instructors.index',compact('instructor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all();
        return view('web.dashborad.instructors.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\InstructorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InstructorRequest $request)
    {
        $request->validated();
        $instructor=Instructor::create($request->all());
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/Images/instructor'), $filename);
            $instructor->image= $filename;
            $instructor->save();
        }
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Instructor $instructor)
    {
        $category=Category::all();
        return view('web.dashborad.instructors.edit',compact('instructor','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\InstructorRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InstructorRequest $request,Instructor $instructor)
    {
        $request->validated();
        if($request->has('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/Images/instructor'), $filename);
            $image_path = public_path('/Images/instructor').'/'.$instructor->image;
            if(file_exists($image_path)):
               unlink($image_path);
            endif;
            $instructor->update($request->all());
            $instructor->image= $filename;
            $instructor->save();
        }else{
            $instructor=Instructor::update($request->all());
        }
        return back()->with('success','date updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instructor $instructor)
    {
        $image_path = public_path('/Images/instructor').'/'.$instructor->image;
        if(file_exists($image_path)):
            unlink($image_path);
        endif;
        $instructor->delete();
        return back()->with('success','date deleted successfully');
    }
}
