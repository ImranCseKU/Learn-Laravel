<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Models\post;

class FrontController extends Controller
{
    public function index(){
        
        $data['current_time'] = date('Y m d, H:i:s');
        $data['links'] =[
            "Facebook"=>"https://facebook.com",
            "Twitter"=>"https://twitter.com",
            "Google"=>"https://google.com",
            "LinkedIn"=>"https://linkedin.com",
            "Github"=>"https://github.com",
        ];
        

        // Cache::flush();

        //cache Logic
        // check if data exists in cache
            // $data['articles'] = post::with('category', 'user')->orderBy('created_at', 'desc')->simplePaginate(5);
        $data['articles'] = Cache::rememberForever('articles', function () {
                return post::with('category', 'user')->orderBy('created_at', 'desc')->take(6)->get();
        });
        // if exists show from Cache
        // if not exists , query from Database
        

        /*
        Cache::get('key', 'default');   //Retrieve
        Cache::remember('key', $seconds, function () {...}); //Retrieve & Store into Cache
        Cache::pull('key');     //Retrieve & Delete
        if (Cache::has('key')) { ... }  //cheak inside Cache
        Cache::put('key', 'value', $seconds);   //store Items
        Cache::forever('key', 'value'); //Storing Items Forever
        Cache::forget('key');   //Removing Items From The Cache
        Cache::flush(); // clear the entire cache 
        */


        
        return view('index', $data);

        // Variable $data passed as a JSON Data
        // return view('index', ["current_time"=>"2020 03 19, 16:57:19"]);
        // return view('index', ["current_time"=>"2020 03 19, 16:57:19" , "links"=> ["Facebook"=>"facebook.com", "google"=>"google.com" ....... ]   ]);

    }

    public function Showposts(){
        return view('post');
    }
}
