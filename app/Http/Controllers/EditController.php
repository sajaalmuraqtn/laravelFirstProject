<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
use Illuminate\Support\Facades\Hash;

class EditController extends Controller
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

    public function edit($id){
        $find = User::find($id);
        return view('edit',['user'=>$find]);
    }




    public function update(Request $request,$id){
        $find = User::find($id);
        $find->name = $request->name;
        $find->phone = $request->phone;
        $find->email = $request->email;
        $find->status = $request->status;

        if($find->save()){
            return redirect()->action([HomeController::class, 'index'])->with('message', 'edit succsessful');
        }
    }


}
