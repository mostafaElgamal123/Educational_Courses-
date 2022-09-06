<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApplyNow;
use App\Http\Requests\Web\Front\ApplyNowRequest;
class ApplyNowControlle extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ApplyNowRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplyNowRequest $request)
    {
        $request->validated();
        $applynow= new ApplyNow();
        $applynow->name=$request->name;
        $applynow->phone=$request->phone;
        $applynow->email=$request->email;
        $applynow->faculty=$request->faculty;
        $applynow->course_id=$request->course_id;
        $applynow->save();
        return response()->json(['success'=>'Thank you for Apply Now. we will contact you shortly.']);
    }
}
