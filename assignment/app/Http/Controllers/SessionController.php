<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;
use App\Models\Session;

class SessionController extends Controller
{
   public $main_array =array();
   
    public function index(){
        return view('session.index');
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
        session()->push('main_array',$arr);
        return redirect('session')->with('status', 'data save to session');
    }

    public function destroy(Request $request){
        $idToDelete = $request->id;
        $data = $request->session()->get('main_array');
        foreach($data as $key=>$value){
            if($key==$idToDelete){
                unset($data[$idToDelete]);
            }
        }
        session()->put('main_array', $data );
        return redirect('session');
    }

    public function edit(Request $request){
        $idToEdit = $request->id;
        $data = $request->session()->get('main_array');
        if(array_key_exists($idToEdit,$data)){
            $specific_array =$data[$idToEdit];
            $id = $idToEdit;
            return view('session.edit', compact('specific_array','id'));
        }
    }

    public function update(Request $request){
        $data = $request->all();
        $arr = $request->session()->get('main_array');
        if (array_key_exists($data['id'], $arr)) {
            $arr[$data['id']]['name'] = $data['uname'];
            $arr[$data['id']]['email'] = $data['email'];
            $arr[$data['id']]['mobile'] = $data['mobile'];
            $arr[$data['id']]['user_role'] = $data['user_role'];
            $arr[$data['id']]['password'] = $data['password'];
            $arr[$data['id']]['date'] = $data['date'];
            if($request->hasFile('ufile')){
                $image = $request->file('ufile');
                $name = $request->file('ufile')->getClientOriginalName();
                $destinationPath = public_path('images');
                $imagePath =  "images\\".  $name;
                $image->move($destinationPath, $name);
                $arr[$data['id']]['image'] = $imagePath;
            }
           
        }
        session()->put('main_array', $arr );
        return redirect('session');
    }


    public function final_submit(Request $request){
       $data = $request->session()->get('main_array');
        Session::insert($data);
        return redirect('session')->with('msg', 'data save into database sucessfully');
    }
}
