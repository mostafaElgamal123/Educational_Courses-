<?php
use App\Http\Controllers\Web\Dashborad\{AboutDashControlle,WhyChooseUsDashControlle,CategoryDashControlle,InstructorDashControlle,CourseDashControlle,TestimonialDashControlle,findinstructorDashControlle,MediaDashControlle,ContactDashControlle,DiplomaOutlineDashControlle,FeedbackDashControlle,ApplyNowDashControlle,DashboradControlle};
use App\Http\Controllers\{RoleControlle,UserController};


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