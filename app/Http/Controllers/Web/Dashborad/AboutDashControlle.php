<?php

namespace App\Http\Controllers\Web\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Http\Requests\Web\Dashborad\AboutRequest;
class AboutDashControlle extends Controller
{
    function __construct()
    {
         $this->middleware('permission:about-list|about-create|about-edit|about-delete', ['only' => ['index','show']]);
         $this->middleware('permission:about-create', ['only' => ['create','store']]);
         $this->middleware('permission:about-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:about-delete', ['only' => ['destroy']]);
    }
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about=About::all();
        return view('web.dashborad.about.index',compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $about=About::all()->count();
        if($about<1):
            return view('web.dashborad.about.create');
        else:
            $about=About::all();
            return view('web.dashborad.about.index',compact('about'));
        endif;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\AboutRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AboutRequest $request)
    {
        // Retrieve the validated input data...
        $request->validated();
        $about=new About;
        if($about->count()<1):
            $about=About::create($request->all());
            if($request->file('image')){
                $file= $request->file('image');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('/Images/about'), $filename);
                $about->image= $filename;
                $about->save();
            }
            $about=About::all();
           return view('web.dashborad.about.index',compact('about'));
        else:
            $about=About::all();
            return view('web.dashborad.about.index',compact('about'));
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $about=About::where('id',$id)->first();
        return view('web.dashborad.about.show',compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        return view('web.dashborad.about.edit',compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\AboutRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AboutRequest $request,About $about)
    {
        // Retrieve the validated input data...
        $request->validated();
        if($request->has('image')){
            $file1= $request->file('image');
            $filename1= date('YmdHi').$file1->getClientOriginalName();
            $file1-> move(public_path('/Images/about'), $filename1);
            $image_path1 = public_path('/Images/about').'/'.$about->image;
            if(file_exists($image_path1)):
               unlink($image_path1);
            endif;
            $about->update($request->all());
            $about->image= $filename1;
            $about->save();
        }else{
            $about=About::update($request->all());
        }
        return back()->with('success','date updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        $image_path = public_path('/Images/about').'/'.$about->image;
        if(file_exists($image_path)):
            unlink($image_path);
        endif;
        $about->delete();
        return back()->with('success','date deleted successfully');
    }
}
