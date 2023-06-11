<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
use Illuminate\Support\Facades\Hash;

class AddController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add()
    {
        return view('add');
    }

    public function create(Request $request)
    {
        $userData=new User();
        $userData->name = $request->name;
        $userData->phone = $request->phone;
        $userData->role = $request->role;
        $userData->email = "sami@gmail.com";
        $userData->password = Hash::make(123456789);

        if($userData->save()){
            return redirect()->back()->with('message', 'add succsessful');
        }
    }
    // public function edit($id){
    //     $find = User::find($id);
    //     return view('edit',['user'=>$find]);
    // }
    // public function editdata($id){
    //     $find = User::find($id);
    //     return view('edit',['user'=>$find]);
    // }


}
