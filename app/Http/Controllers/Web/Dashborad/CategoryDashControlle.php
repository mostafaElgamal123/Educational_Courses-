<?php

namespace App\Http\Controllers\Web\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
class CategoryDashControlle extends Controller
{
    function __construct()
    {
         $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index','show']]);
         $this->middleware('permission:category-create', ['only' => ['create','store']]);
         $this->middleware('permission:category-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category=Category::with('instructors','courses')->paginate(6);
        return view('web.dashborad.categories.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.dashborad.categories.create');
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
            'name'       =>'required|min:3|max:150',
            'slug'                =>'required|min:3|max:150'
        ]);
        $category=new Category();
        $category->slug=Str::of($request->slug)->slug('-');
        $category->name=$request->name;
        $category->save();
        //$category=Category::create($request->all());
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
        $category=Category::where('slug',$slug)->first();
        return view('web.dashborad.categories.edit',compact('category'));
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
        $category=Category::where('slug',$slug)->first();
        $request->validate([
            'name'       =>'required|min:3|max:150',
            'slug'                =>'required|min:3|max:150'
        ]);
        $category->slug=Str::of($request->slug)->slug('-');
        $category->update($request->except('token'));
        $category->save();
        return redirect('categories')->with('success','date updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
       $category=Category::where('slug',$slug)->first();
       if($category->delete()){
        return response()->json([
            'success' => 'Record deleted successfully!',
            'id'      =>  $category->id
        ]);
        }
    }
}
