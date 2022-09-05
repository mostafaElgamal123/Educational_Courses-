<?php

namespace App\Http\Controllers\Web\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboradControlle extends Controller
{

    function __construct()
    {
         $this->middleware('permission:dashborad-list|dashborad-create|dashborad-edit|dashborad-delete', ['only' => ['index','show']]);
    }


    public function index(){
        return view('web.dashborad.welcome.index');
    }
}
