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
        $userData->status = 1;
        $userData->email = "sara@gmail.com";
        $userData->password = Hash::make(123456789);

        if($userData->save()){
            return redirect()->action([HomeController::class, 'index'])->with('message', 'add succsessful');
        }
    }

    public function delete($id){
        $user = User::find($id);

        if($user){
            $user->delete();
            return redirect()->action([HomeController::class, 'index'])->with('message', 'Delete successful');
        }
        else{
            return redirect()->action([HomeController::class, 'index'])->with('message', 'User not found');
        }
    }
    }


