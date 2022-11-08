<?php

namespace App\Http\Controllers\Web\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApplyNow;
class ApplyNowDashControlle extends Controller
{
    function __construct()
    {
         $this->middleware('permission:applynow-list|applynow-create|applynow-edit|applynow-delete', ['only' => ['index','show']]);
         $this->middleware('permission:applynow-create', ['only' => ['create','store']]);
         $this->middleware('permission:applynow-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:applynow-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applynow=ApplyNow::paginate(6);
        return view('web.dashborad.applynow.index',compact('applynow'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ApplyNow $applynow)
    {
        if($applynow->delete()){
            return response()->json([
                'success' => 'Record deleted successfully!',
                'id'      =>  $applynow->id
            ]);
        }
    }
}
