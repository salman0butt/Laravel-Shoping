<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::paginate(5);
        return view('admin.categories.index', compact('categories'));
    }
    public function trash()
    {
        $categories = Category::onlyTrashed()->paginate(5);
        return view('admin.categories.index', compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.categories.create',compact('categories'));
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
            'title' => 'required|min:5',
            'slug' => 'required|min:5'
        ]);
        $categories = Category::create($request->only('title','description','slug'));
        if (isset($request->parent_id)) {
               // dd($request->parent_id);
            $categories->childrens()->attach($request->parent_id);
        }
        return back()->with('success','Category SuccessFully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //

        $categories = Category::where('id','!=',$category->id)->get();
        return view('admin.categories.create',['category'=>$category,'categories'=>$categories]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        $request->validate([
            'title' => 'required|min:5',
            'slug' => 'required|min:5'
        ]);
        $category->update($request->only('title','description','slug'));
        if (isset($request->parent_id)) {
            $category->childrens()->detach();
            $category->childrens()->attach($request->parent_id);
        }
        return back()->with('success','Category SuccessFully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::withTrashed()->where('id',$id);
       // $category->childrens()->detach();
        if ($category->forceDelete()){
            return back()->with('success','Category SuccessFully Deleted');
        }else {
            return back()->with('danger','Error Deleting Records');
        }
    }
    public function remove(Category $category)
    {
        //
        if ($category->delete()){
            return back()->with('success','Category SuccessFully Trashed');
        }else {
            return back()->with('danger','Error Deleting Records');
        }
    }
    public function recoverCat($id) {
        $category = Category::onlyTrashed()->findOrFail($id);
        if ($category->restore()){
            return back()->with('success','Category SuccessFully Restored');
        }else {
            return back()->with('danger','Error in restoring Records');
        }
    }
}
