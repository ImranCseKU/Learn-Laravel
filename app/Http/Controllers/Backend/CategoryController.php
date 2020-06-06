<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\category;

class CategoryController extends Controller
{
    public function index(){
        // $categories = category::all();
        // $categories = category::select('id', 'name', 'slag','status')->orderBy('id', 'desc')->get();
        // $categories = category::select('id', 'name', 'slag','status')->orderBy('name')->take(5)->get();
        $categories = category::select('id', 'name', 'slag','status')->orderBy('id', 'desc')->paginate(5);
        return view('category.index', compact('categories'));
    }

    public function create(){
        
        return view('category.create');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:25|min:3',
            'status' => 'required',
        ]);

        //1st way: database insert
        // $data = new category;
        // $data->name = trim($request->name);
        // $data->slag = str_slug($request->name);
        // $data->status = $request->status;

        // $data->save();

        // 2nd way: database insert
        category::create([
            'name'=> trim($request->name),
            'slag'=> Str::slug(trim($request->name)),
            'status'=>$request->status
        ]);

        return redirect()->route('categories.index');

    }
    public function show( $id){
        // $category = category::find($id);

        // also find all post under this category By make a rilation between category and post
        // $category = category::with('posts')->find($id);
        $category = category::with('posts', 'posts.user')->find($id); // category to post and post er sathe abar user related
        return view('category.show', ['category'=>$category]);
    }


    public function edit($id){
        $category = category::find($id);
        return view('category.edit', compact('category'));
    }
    public function update(Request $request, $id){
        $data = category::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:categories,name,'.$data->id . '|max:25|min:3',
            'status' => 'required',
        ]);

        
        $data->name = trim($request->name);
        $data->slag = Str::slug(trim($request->name));
        $data->status = $request->status;

        $data->save();
        return redirect()->route('categories.index');
    }
    public function destroy($id){
        $category = category::find($id);
        $category->delete();

        \session()->flash('message','Delete Successfull.');
        \session()->flash('type', 'success');
        
        return redirect()->route('categories.index');
    }

}
