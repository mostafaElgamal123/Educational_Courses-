<?php

namespace App\Http\Controllers\Web\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Media;
use App\Http\Requests\Web\Dashborad\MediaRequest;
class MediaDashControlle extends Controller
{
    function __construct()
    {
         $this->middleware('permission:medias-list|medias-create|medias-edit|medias-delete', ['only' => ['index','show']]);
         $this->middleware('permission:medias-create', ['only' => ['create','store']]);
         $this->middleware('permission:medias-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:medias-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $media=Media::all();
        if($media->count()<=0){
            return view('web.dashborad.media.index',compact('media'));
        }else{
            $media=Media::first();
            return view('web.dashborad.media.update',compact('media'));
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\MediaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MediaRequest $request)
    {
        $request->validated();
        $media=Media::create($request->all());
        return view('web.dashborad.media.update',compact('media'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\MediaRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MediaRequest $request,Media $media)
    {
        $request->validated();
        $media->update($request->all());
        return view('web.dashborad.media.update',compact('media'));
    }

}
