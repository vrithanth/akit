<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::paginate(10);
        $DATA['users'] = $users;
        return view('home',$DATA);
    }

    public function create(Request $request){
        if($request->ismethod('post')){
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'last' => 'nullable|string|max:50',
                'age' => 'nullable|integer|min:0',
            ]);
            $result = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'last' => $request->last,
                'age' => $request->age,
            ]);
            if($result){
                $msg = "user created successfully";
                return redirect('/create')->with('message',$msg);
            }else{
                $msg = "user created successfully";
                return redirect()->back()->with('message',$msg);
            }
        }
        return view('create');
    }

    public function update(Request $request){
        if($request->isMethod('get')){
            $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email|max:255',
            ]);        
            if($validator->fails()){
                return redirect()->back();
            } 
        }elseif($request->isMethod('post')){
            $this->validate($request,[
                'email' => 'required|string|email|max:255',
                'name' => 'required|string|max:255',
                'last' => 'nullable|string|max:50',
                'age' => 'nullable|integer|min:0',
            ]);
            $cdata['name'] = $request->name;
            $cdata['last'] = $request->last;
            $cdata['age'] = $request->age;
            User::where('email',$request->email)->update($cdata);
            $msg = "successfully updated";            
            return redirect('/home')->with('message',$msg);
        }
        
        $udata = User::where('email',$request->email)->first();
        $DATA['udata'] = $udata;
        return view('update',$DATA);
    }
    public function delete(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email|max:255',
        ]);        
        if($validator->fails() || auth()->user()->email== $request->email){
            return redirect()->back()->with('message','Invalid request');
        }else{
            $result = User::where('email',$request->email)->delete();
            if($result){
                $msg = "successfully removed";
            }else{
                $msg = "user can't be removed";
            }
        }
        return redirect('home')->with('message',$msg);            
    }
    public function admin_page(){
        return view('admin_page');
    }
}
