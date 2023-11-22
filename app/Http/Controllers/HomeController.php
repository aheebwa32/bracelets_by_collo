<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Https\Models\User;
class HomeController extends Controller
{
    public function redirect()
    {
        
        if (Auth::check()) {
            $usertype = Auth::user()->usertype;

            
            if (isset($usertype)) {
                if ($usertype == 1) {
                    return view('admin.home');
                } else {
                    return view('dashboard');
                }
            } else {
                
                return redirect()->route('login')->with('error', 'User type not available.');
            }
        } else {
            
            return redirect()->route('login')->with('error', 'User not authenticated.');
        }
    }


    public function index(){

        return view('Userpage.userpage');
        
        }
}
