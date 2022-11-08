<?php

namespace App\Http\Controllers\Web\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Str;
class FeedbackDashControlle extends Controller
{
    function __construct()
    {
         $this->middleware('permission:feedback-list|feedback-create|feedback-edit|feedback-delete', ['only' => ['index','show']]);
         $this->middleware('permission:feedback-create', ['only' => ['create','store']]);
         $this->middleware('permission:feedback-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:feedback-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedback=Feedback::paginate(6);
        return view('web.dashborad.feedback.index',compact('feedback'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.dashborad.feedback.create');
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
            'feedback'       =>'required|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'status'       =>'required',
            'slug'                =>'required|min:3|max:150'
        ]);
        $feedback=Feedback::create($request->all());
        $feedback->slug=Str::of($request->slug)->slug('-');
        $feedback->save();
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
    public function edit($slug)
    {
        $feedback=Feedback::where('slug',$slug)->first();
        return view('web.dashborad.feedback.edit',compact('feedback'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$slug)
    {
        $feedback=Feedback::where('slug',$slug)->first();
        $request->validate([
            'feedback'       =>'required|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'status'       =>'required',
            'slug'                =>'required|min:3|max:150'
        ]);
        $feedback->update($request->except('token'));
        $feedback->slug=Str::of($request->slug)->slug('-');
        $feedback->save();
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
        $feedback=Feedback::where('slug',$slug)->first();
        if($feedback->delete()){
            return response()->json([
                'success' => 'Record deleted successfully!',
                'id'      =>  $feedback->id
            ]);
        }
    }
}
