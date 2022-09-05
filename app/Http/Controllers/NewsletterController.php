<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Newsletter;
class NewsletterController extends Controller
{
 
    public function store(Request $request)
    {
        $request->validate([
            'newsletter'       =>'required|email|unique:users,email',
        ]);
        if ( ! Newsletter::isSubscribed($request->newsletter) ) 
        {
            Newsletter::subscribePending($request->newsletter);
            return response()->json(['successletter'=>'Thanks For Subscribe']);
        }
        return response()->json(['error'=>'Sorry! You have already subscribed ']);
            
    }
}
