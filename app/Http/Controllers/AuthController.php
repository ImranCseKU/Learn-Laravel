<?php

namespace App\Http\Controllers;

use App\Jobs\MailVerificationJob;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;    //helps to password Hash
use Illuminate\Support\Facades\Auth;   // helps to login or logout process
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Mail\VerificationEmail;
use App\Models\User;                    //create a new user using User Model
use App\Notifications\VerifyEmailNotification;
use Exception;

class AuthController extends Controller
{
    public function ShowRegisterForm(){
        return view('frontend.register');
    }

    public function RegistrationProcess(Request $request){

        $validator = Validator::make($request->all(), [
            'name'=> 'required|min:4|max:30',
            'email' => 'required|email:rfc,dns|unique:users',
            'phone_number'=>'required|unique:users',
            'password'=>'required|confirmed|min:4',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        // do oparation upon input data ...
        $data = [
            "name"     => trim($request->name),
            "email"    => strtolower(trim($request->email)),
            "phone_number"     => trim($request->phone_number),
            "password" => Hash::make($request->password),
            "email_verification_token" => Str::random(32),
        ];

        try {
            // store data into users table
            $user = User::create($data);
            
            // Mail Send to the SMTP Server ==> using user email send varification mail
            // Mail::to( $user->email )->send( new VerificationEmail($user)); 
            
            //send mail using queue: We have to tigger *Job* for queue

            // dispatch(new MailVerificationJob($user) );

            // MailVerificationJob::dispatch($user)
            //     ->delay(now()->addSeconds(5));

            //Send Notification
            $user->notify(new VerifyEmailNotification($user));

            //session pass
            session()->flash('message', 'User Account Created. Please Verify Your Email.');
            session()->flash('type', 'success');

            // return redirect()->route('login');
            return redirect()->back();

        } catch(Exception $e){
            session()->flash('message',  $e->getMessage());
            session()->flash('type', 'danger');

            return redirect()->back();
        }
        
        
        // Hold the form data And Show it
        // return response()->json($request->all());
        // return response()->json($request->only('email','password'));
        // return response()->json($request->except('_token'));

    }


    public function ShowLoginForm(){
        return view('frontend.login');
    }


    public function LoginProcess(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email:rfc,dns',
            'password'=>'required|min:4',
        ]);

        $credentials = $request->only('email', 'password');
        
        //Manually cheak user login credentials
        // $user_details = DB::table('users')->where('email', $credentials['email'] )->first();
        // if(Hash::check( $credentials['password'], $user_details->password ) ){
        //     return redirect()->route('profile');
        // }


        // Authinticate User using Laravel "Auth" Class by passing email & password... 
        if(Auth::attempt($credentials)){
            //check user is verified or not
            $user_details = Auth::user();
            if($user_details->email_verified === 0){
                Auth::logout();

                session()->flash('message', "Your Account in not activated. Please verify your account.");
                session()->flash('type', 'danger');
                return redirect()->back();
            }
            //if verified , give the permission to access this Application
            return redirect()->route('profile');
        }

        session()->flash('message', "Invalid credentials");
        session()->flash('type', 'danger');
        return redirect()->back();

        
    }


    public function LogoutProcess(){
        //logout user using Auth class
        Auth::logout();
        Return \redirect('/');
    }

    public function ShowProfile(){
        return view('profile');
    }
}
