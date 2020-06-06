<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Models\post;
use App\Models\category;
use Auth;

class PostController extends Controller
{
    
    public function index()
    {
        // $posts = post::select('id', 'title', 'category_id', 'user_id','status')->paginate(5);
        //Eager Loading
        // $posts = post::with('category')->select('id', 'title', 'category_id', 'user_id','status')->paginate(5);
        $posts = post::with('category', 'user')->select('id', 'title', 'category_id', 'user_id','status')->paginate(5);
        return view('post.index', ['posts'=>$posts]);
        
    }

    
    public function create()
    {
        // show post created form
        $categories = category::all();
        return view('post.create', compact('categories'));
    }

    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'status' => 'required',
        ]);

        $data['title'] = $request->title;
        $data['category_id'] =$request->category_id;
        $data['user_id'] = Auth::user()->id;
        $data['content'] = $request->content;
        $data['thumbnail_path'] = 'default.png';
        $data['status'] = $request->status;

        post::create($data);
        session()->flash('message', "Post Created");
        return redirect()->back();


    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
