<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\User;

class MailVerifyController extends Controller
{
    public function VerifyEmail($token){
        // update some of the data for those who  varify this Token
        // Set 1 at "email_verified"
        // Set timestamp at "email_verified_at" 
        // email_verification_token will be null(no need for this token for verified user)

        if( $token === null){

            session()->flash('message', 'Invalid Token');
            session()->flash('type', 'warnaing');

            return redirect()->route('login');
        }
        else{
            $user = User::where('email_verification_token', $token)->first();

            if( $user === null){

                session()->flash('message', 'Invalid Token');
                session()->flash('type', 'warnaing');
    
                return redirect()->route('login');
            }
            else{

                $user->update([
                    'email_verified_at' => now(),
                    'email_verified'=> 1,
                    'email_verification_token'=> '',
                ]);

                session()->flash('message', 'Your Account is Activated. You can login now.');
                session()->flash('type', 'success');
    
                return redirect()->route('login');
            }

        }
    }
}
