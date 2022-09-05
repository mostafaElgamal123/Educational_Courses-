<?php

namespace App\Http\Controllers\Web\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Http\Requests\Web\Dashborad\TestimonialRequest;
class TestimonialDashControlle extends Controller
{
    function __construct()
    {
         $this->middleware('permission:testimonial-list|testimonial-create|testimonial-edit|testimonial-delete', ['only' => ['index','show']]);
         $this->middleware('permission:testimonial-create', ['only' => ['create','store']]);
         $this->middleware('permission:testimonial-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:testimonial-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonial=Testimonial::paginate(6);
        return view('web.dashborad.testimonial.index',compact('testimonial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.dashborad.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\TestimonialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestimonialRequest $request)
    {
        $request->validated();
        $testimonial=Testimonial::create($request->all());
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/Images/testimonial'), $filename);
            $testimonial->image= $filename;
            $testimonial->save();
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
    public function edit(Testimonial $testimonial)
    {
        return view('web.dashborad.testimonial.edit',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\TestimonialRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TestimonialRequest $request,Testimonial $testimonial)
    {
        $request->validated();
        if($request->has('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/Images/testimonial'), $filename);
            $image_path = public_path('/Images/testimonial').'/'.$testimonial->image;
            if(file_exists($image_path)):
               unlink($image_path);
            endif;
            $testimonial->update($request->all());
            $testimonial->image= $filename;
            $testimonial->save();
        }else{
            $testimonial=Testimonial::update($request->all());
        }
        return back()->with('success','date updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        $image_path = public_path('/Images/testimonial').'/'.$testimonial->image;
        if(file_exists($image_path)):
            unlink($image_path);
        endif;
        $testimonial->delete();
        return back()->with('success','date deleted successfully');
    }
}
