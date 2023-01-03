<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;

class SessionController extends Controller
{
   public $main_array =[];
    // public __construct(){

    // }
    public function index(){
        $data = session('data');
        // dd($data);
        return view('session.index', compact('data'));

    }

    public function store(Request $request){
        $data = $request->all();
        $imagePath = '';
        if($request->hasFile('ufile')){
            $image = $request->file('ufile');
            $name = $request->file('ufile')->getClientOriginalName();
            $destinationPath = public_path('images');
            $imagePath =  "images\\".  $name;
            $image->move($destinationPath, $name);
        }
        $arr = [];
        $arr['name'] = $data['uname'];
        $arr['email'] = $data['email'];
        $arr['user_role'] = $data['user_role'];
        $arr['password'] = $data['password'];
        $arr['date'] = $data['date'];
        $arr['mobile'] = $data['mobile'];
        $arr['image'] = $imagePath;
        array_push($this->main_array, $arr);
        session()->push('data',$arr);
        dd(session('data'));
        $data =session('data');
        return redirect('session')->with(['data'=>$data]);
        // return redirect('session')->with('status', 'data save to session');
    }
}
