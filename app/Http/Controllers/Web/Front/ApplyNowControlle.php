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
        $applynow=ApplyNow::create($request->all());
        return response()->json(['success'=>'Thank you for Apply Now. we will contact you shortly.']);
    }
}
