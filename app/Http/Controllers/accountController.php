<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\orderList;
use App\stmodel;

class accountController extends Controller
{
    public function index(){
        return view('home.my-account');
    }

    public function editLog(Request $req){
        $user = stmodel::where('studentId',$req->session()->get('username'))
                        ->get();    
        return view('myAccount.editPersonal')->with('user', $user);
    }

    public function updatePersonal( Request $req){

        $user = stmodel::where('studentId',$req->session()->get('username'))
                        ->first();

        $user->studentId     = $req->Username;
        $user->name          = $req->name;
        $user->password      = $req->password;
        $user->mobile        = $req->mobile;
        $user->collage       = $req->collage;
        $user->dormitory     = $req->dormitory;

        if ($user->save()) {
            return redirect()->route('myAccount');
        }else{
            return back();
        }
   
        
    }

    public function profilePic(){
        
        return view('myAccount.editProfilePic');
    }

    public function editProfilePic(Request $req){
        if ($req->hasFile('myPic')) {
            $file = $req->file('myPic');

            if($file->move('upload', $file->getClientOriginalName())){
        		
                $user = stmodel::where('studentId',$req->session()->get('username'))
                        ->first();
                
                $user->picture  = $file->getClientOriginalName();

                if($user->save()){
                    return redirect()->route('myAccount');
                }else{
                    return back();
                }

        	}else{
        		return back();
        	}
        }
    }

    public function orderList(Request $req){
        $order = orderList::where('studentId',$req->session()->get('username'))
                            ->get();
        
      
        return view('myAccount.orderlist')->with('order', $order);
    }
}
