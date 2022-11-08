<?php

use Illuminate\Support\Str;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\Web\Front\{HomeControlle,AboutControlle,CourseControlle,ContactControlle,CategoryControlle,CheckoutControlle,ApplyNowControlle,CourseSearchController};

use App\Models\Contact;



Route::get('/', function () {
    return redirect()->route('index');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('login');

Route::get('home',[HomeControlle::class,'index'])->name('index');
//about route
Route::get('about',[AboutControlle::class,'index'])->name('about');
//course route
Route::get('course',[CourseControlle::class,'index'])->name('course');
Route::get('courses/{course}',[CourseControlle::class,'show']);
//contact route
Route::get('contact',[ContactControlle::class,'index'])->name('contact');
Route::post('contacts',[ContactControlle::class,'store']);
//category
Route::get('categories/{category}',[CategoryControlle::class,'show']);
//Apply
Route::post('applynows',[ApplyNowControlle::class,'store']);
Route::get('send-mail', function () {

    $emails=Contact::chunk(50,function($data){
        dispatch(new App\Jobs\SendMail($data));
    });
    
    return view('web.dashborad.contact.sendmail');   
});

Route::get('checkouts/{checkout}',[CheckoutControlle::class,'show']);

Route::get('search',[CourseSearchController::class,'SearchCourse']);


Route::post('newsletter',[NewsletterController::class, 'store']);