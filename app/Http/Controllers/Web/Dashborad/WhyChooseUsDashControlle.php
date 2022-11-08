<?php

namespace App\Http\Controllers\Web\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WhyChooseUs;
use App\Http\Requests\Web\Dashborad\WhyChooseUsRequest;
use Storage;
use Illuminate\Support\Str;
class WhyChooseUsDashControlle extends Controller
{
    function __construct()
    {
         $this->middleware('permission:whychooseus-list|whychooseus-create|whychooseus-edit|whychooseus-delete', ['only' => ['index','show']]);
         $this->middleware('permission:whychooseus-create', ['only' => ['create','store']]);
         $this->middleware('permission:whychooseus-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:whychooseus-delete', ['only' => ['destroy']]);
    }
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $whychoose=WhyChooseUs::all();
        return view('web.dashborad.why-choose-us.index',compact('whychoose'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $whychoose=WhyChooseUs::all()->count();
        if($whychoose<1):
            return view('web.dashborad.why-choose-us.create');
        else:
            $whychoose=WhyChooseUs::all();
            return view('web.dashborad.why-choose-us.index',compact('whychoose'));
        endif;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\WhyChooseUsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WhyChooseUsRequest $request)
    {
        // Retrieve the validated input data...
        $request->validated();
        $whychoose=new WhyChooseUs;
        if($whychoose->count()<1):
            if($request->hasFile('image')){
                $file= $request->file('image');
                $destination_path='images/whychoose/';
                $filename=date('YmdHi').$file->getClientOriginalName();
                $path =$request->file('image')->storeAs($destination_path,$filename);
                $whychoose=WhyChooseUs::create($request->all());
                $whychoose->image= $path;
                $whychoose->slug=Str::of($request->slug)->slug('-');
                $whychoose->save();
            }
            $whychoose=WhyChooseUs::all();
           return view('web.dashborad.why-choose-us.index',compact('whychoose'));
        else:
            $whychoose=WhyChooseUs::all();
            return view('web.dashborad.why-choose-us.index',compact('whychoose'));
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
        $whychooseus=WhyChooseUs::where('slug',$slug)->first();
        return view('web.dashborad.why-choose-us.show',compact('whychooseus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $whychoose=WhyChooseUs::where('slug',$slug)->first();
        return view('web.dashborad.why-choose-us.edit',compact('whychoose'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\WhyChooseUsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WhyChooseUsRequest $request,WhyChooseUs $whychoose)
    {
        // Retrieve the validated input data...
        $request->validated();
        if($request->hasFile('image')){
            $file= $request->file('image');
            $destination_path='images/whychoose/';
            $filename=date('YmdHi').$file->getClientOriginalName();
            $path =$request->file('image')->storeAs($destination_path,$filename);
            if(Storage::delete($whychoose->image)){
            $whychoose->update($request->all());
            $whychoose->image= $path;
            $whychoose->slug=Str::of($request->slug)->slug('-');
            $whychoose->save();
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
        $whychoose=WhyChooseUs::where('slug',$slug)->first();
        if(Storage::delete($whychoose->image)) {
            if($whychoose->delete()){
                return response()->json([
                    'success' => 'Record deleted successfully!',
                    'id'      =>  $whychoose->id
                ]);
            }
         }
    }
}
