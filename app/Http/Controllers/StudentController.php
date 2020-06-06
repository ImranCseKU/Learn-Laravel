<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     * Display list of the Student ...
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_std = DB::table('students')->get();
        
        return view('std/all_student', compact('all_std'));
    }

    /**
     * Show the form for creating a new resource.
     * Show the add Student Form ...
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('std.add_student');
    }

    /**
     * Store a newly created resource in storage.
     * Add Student into the database ... 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['name'] = $request->std_name;
        $data['roll'] =$request->std_roll;
        $data['address'] = $request->std_address;

        $res = DB::table('students')->insert($data);
        return Redirect()->to('/');
    }

    /**
     * Display the specified resource.
     * View the details of a specific student... 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $A_Student = DB::table('students')->where('id', $id)->first();
        return view('std.view_student', compact('A_Student'));
    }

    /**
     * Show the form for editing the specified resource.
     * Give the Edit Form ... 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $A_Student = DB::table('students')->where('id', $id)->first();
        return view('std.edit_student', compact('A_Student'));
    }

    /**
     * Update the specified resource in storage.
     * Update data and save it into database ... 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except(['_token', '_method']);
        
        $update_res = DB::table('students')->where('id', $id)->update($data);
        return Redirect()->to('/student');
    }

    /**
     * Remove the specified resource from storage.
     * Delete Data From database ...
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('students')->where('id', $id)->delete();
        return Redirect()->back();

    }
}
