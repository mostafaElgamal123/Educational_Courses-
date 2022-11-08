<?php

namespace App\Http\Controllers\Web\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Http\Requests\Web\Dashborad\AboutRequest;
use Storage;
use Illuminate\Support\Str;
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
            if($request->hasFile('image')){
                $file= $request->file('image');
                $destination_path='images/about/';
                $filename=date('YmdHi').$file->getClientOriginalName();
                $path =$request->file('image')->storeAs($destination_path,$filename);
                $about=About::create($request->all());
                $about->image= $path;
                $about->slug=Str::of($request->slug)->slug('-');
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
    public function show($slug)
    {
        $about=About::where('slug',$slug)->first();
        return view('web.dashborad.about.show',compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $about=About::where('slug',$slug)->first();
        return view('web.dashborad.about.edit',compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\AboutRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AboutRequest $request,$slug)
    {
        $about=About::where('slug',$slug)->first();
        // Retrieve the validated input data...
        $request->validated();
        if($request->hasFile('image')){
            $file= $request->file('image');
            $destination_path='images/about/';
            $filename=date('YmdHi').$file->getClientOriginalName();
            $path =$request->file('image')->storeAs($destination_path,$filename);
            if(Storage::delete($about->image)){
            $about->update($request->all());
            $about->image= $path;
            $about->slug=Str::of($request->slug)->slug('-');
            $about->save();
        }
        }
        return back()->with('success','date updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $about=About::where('slug',$slug)->first();
        if(Storage::delete($about->image)) {
            if($about->delete()){
                return response()->json([
                    'success' => 'Record deleted successfully!',
                    'id'      =>  $about->id
                ]);
            }
         }
        
    }
}
