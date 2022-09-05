<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Front\HomeControlle;
use App\Http\Controllers\Web\Front\AboutControlle;
use App\Http\Controllers\Web\Front\CourseControlle;
use App\Http\Controllers\Web\Front\ContactControlle;
use App\Http\Controllers\Web\Front\CategoryControlle;
use App\Http\Controllers\Web\Front\CheckoutControlle;
use App\Http\Controllers\Web\Front\ApplyNowControlle;
use App\Http\Controllers\Web\Front\CourseSearchController;
use App\Http\Controllers\Web\Dashborad\AboutDashControlle;
use App\Http\Controllers\Web\Dashborad\WhyChooseUsDashControlle;
use App\Http\Controllers\Web\Dashborad\CategoryDashControlle;
use App\Http\Controllers\Web\Dashborad\InstructorDashControlle;
use App\Http\Controllers\Web\Dashborad\CourseDashControlle;
use App\Http\Controllers\Web\Dashborad\TestimonialDashControlle;
use App\Http\Controllers\Web\Dashborad\findinstructorDashControlle;
use App\Http\Controllers\Web\Dashborad\MediaDashControlle;
use App\Http\Controllers\Web\Dashborad\ContactDashControlle;
use App\Http\Controllers\Web\Dashborad\DiplomaOutlineDashControlle;
use App\Http\Controllers\Web\Dashborad\FeedbackDashControlle;
use App\Http\Controllers\Web\Dashborad\ApplyNowDashControlle;
use App\Http\Controllers\Web\Dashborad\DashboradControlle;
use App\Http\Controllers\RoleControlle;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsletterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('index');
});



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('login');

Route::group(['middleware' => ['auth']], function() {
    //dashborad route
    Route::get('/dashborad',[DashboradControlle::class,'index'])->name('dashborad');
    Route::resource('/roles', RoleControlle::class);
    Route::resource('/users', UserController::class);
    Route::resource('/categories',CategoryDashControlle::class);
    Route::resource('/abouts',AboutDashControlle::class);
    Route::resource('/whychoose',WhyChooseUsDashControlle::class);
    Route::resource('/instructors',InstructorDashControlle::class);
    Route::resource('/courses',CourseDashControlle::class);
    Route::resource('/testimonials',TestimonialDashControlle::class);
    Route::get('/medias',[MediaDashControlle::class,'index']);
    Route::post('/medias',[MediaDashControlle::class,'store']);
    Route::put('/medias/{media}',[MediaDashControlle::class,'update']);
    Route::get('/findinstructor',[findinstructorDashControlle::class,'store']);
    Route::resource('contacts',ContactDashControlle::class);
    Route::resource('/diplomaoutlines',DiplomaOutlineDashControlle::class);
    Route::resource('/feedbackS',FeedbackDashControlle::class);
    Route::resource('/applynows',ApplyNowDashControlle::class);
});


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
   
    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];
   
    \Mail::to('your_receiver_email@gmail.com')->send(new \App\Mail\MyTestMail($details));
   
});

Route::get('checkouts/{checkout}',[CheckoutControlle::class,'show']);

Route::get('search',[CourseSearchController::class,'SearchCourse']);


Route::post('newsletter',[NewsletterController::class, 'store']);