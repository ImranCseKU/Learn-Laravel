<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{

    //call controller function passing $id
    public function about($id){
        return "Welcome to admin panel. Your id:".$id;
    }

    //call controller function passing $id and $name(optional)
    public function career($id, $name=''){
        return "Welcome to admin panel.Your name:".$name;
    }

    // Register User...
    public function ShowRegisterForm(){
        return view('register');
    }
    public function ProcessRegistration(Request $request){

        $validated= $request->validate([
            'email'=> 'required|email',
            'password'=>'required|min:4',
            'photo' =>'required|image|max:512'
        ]);

        $photo= $request->file('photo'); // it will gives an uploded file obj

        // echo $photo->getClientOriginalName();
        // echo "</br>";
        // echo $photo->getClientOriginalExtension();
        // echo "</br>";
        // echo $photo->getClientSize();

        $photoName = uniqid('photo_',true).str_random(10) . '.' . $photo->getClientOriginalExtension();

    

        if($photo->isValid()){
            $photo->storeAs('images', $photoName );
        }
        
        // Hold the form data And Show it
        // return response()->json($request->all());
        // return response()->json($request->only('email','password'));
        // return response()->json($request->except('_token'));


        session()->flash('message', 'Photo uploded!');
        return redirect()->back();

    }
    
    
}
