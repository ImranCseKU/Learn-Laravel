<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            "success"=> true,
            "message"=> 'user list',
            "data"=> User::all()
        ]);
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
        $validator = Validator::make($request->all(), [
            'name'=> 'required|min:4|max:30',
            'email' => 'required|email:rfc,dns|unique:users',
            'phone_number'=>'required|unique:users',
            'password'=>'required|confirmed|min:4',
        ]);

        if ($validator->fails()) {
            // api er khetree fail jodi kore error gulo outpot hisabe dekhate hobe..ekhetre redirect korar kisu nai
            return response()->json($validator->getMessageBag()->all() );
        }

        // Do oparation upon input data ...
        $data = [
            "name"     => trim($request->name),
            "email"    => strtolower(trim($request->email)),
            "phone_number"     => trim($request->phone_number),
            "password" => $request->password,
            "email_verification_token" => Str::random(10),
        ];

      
        $user = User::create($data);
        
        // $user->notify(new VerifyEmailNotification($user));

        // return redirect()->back();
        // redirect hobe nah. jest json e ekta message return korbe

        return response()->json([
            'message'=> 'User Account Created'
        ]);

       
        
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
}
