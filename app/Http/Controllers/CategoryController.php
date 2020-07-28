<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{

    public function __construct(){
        $this->middleware("auth:admin");
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('pages.category')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Initialize the Category
        $category = new Category();
    //   /  $category->name = $request->categoryName;
        $category->name = $request->input('name');
        $category->author = "Laith Zghoul";

        $category->save();
    // Success Saved successfully
        session()->flash('Success', ' Category Name: ' . $category->name . ' Added Successfully! ');

        return redirect()->back();
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function removeCategory(request $request){
        // Find Category
        $category = Category::findOrFail($request->id);
        // Delete Category
        $category->delete();

        // Session Message
        session()->flash('success', 'Category Named ' . $category->name . 'Removed Successfully');

        return json_encode(['Success' => 'Category Named ' . $category->name . 'Removed Successfully']);
    }

    public function editCategory(request $request){
        // Find Category
        $category = Category::findOrFail($request->id);
        // Change the name
        $category->name = $request->name;
        // Updating Category
        $category->update();

        session()->flash('Success', 'Category name changed successfully to: ' . $category->name );

        return json_encode(['Success' => 'Category name changed successfully to: ' . $category->name ]);
    }

}
