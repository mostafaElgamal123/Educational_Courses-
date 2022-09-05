<?php

namespace App\Http\Controllers\Web\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WhyChooseUs;
use App\Http\Requests\Web\Dashborad\WhyChooseUsRequest;
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
            $whychoose=WhyChooseUs::create($request->all());
            if($request->file('image')){
                $file= $request->file('image');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('/Images/whychooseus'), $filename);
                $whychoose->image= $filename;
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
    public function show($id)
    {
        $whychooseus=WhyChooseUs::where('id',$id)->first();
        return view('web.dashborad.why-choose-us.show',compact('whychooseus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(WhyChooseUs $whychoose)
    {
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
        if($request->has('image')){
            $file1= $request->file('image');
            $filename1= date('YmdHi').$file1->getClientOriginalName();
            $file1-> move(public_path('/Images/whychooseus'), $filename1);
            $image_path1 = public_path('/Images/whychooseus').'/'.$whychoose->image;
            if(file_exists($image_path1)):
               unlink($image_path1);
            endif;
            $whychoose->update($request->all());
            $whychoose->image= $filename1;
            $whychoose->save();
        }else{
            $whychoose=WhyChooseUs::update($request->all());
        }
        return back()->with('success','date updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(WhyChooseUs $whychoose)
    {
        $image_path = public_path('/Images/whychooseus').'/'.$whychoose->image;
        if(file_exists($image_path)):
            unlink($image_path);
        endif;
        $whychoose->delete();
        return back()->with('success','date deleted successfully');
    }
}
