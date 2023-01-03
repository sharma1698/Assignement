<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slot;
use DB;
use Illuminate\Support\Facades\Validator;

class SlotController extends Controller
{
    public function index(){
       $data = Slot::all();
        return view('slot.index', compact("data"));
    }
    public function store(Request $request){
        $data= json_decode($request->data);
        $arr=[];
        $i=1;
        foreach($data as $key=>$value){
            $arr['field' . $i] = $value;
            $i++;
        }
        Slot::insert($arr);
        $total_slots =Slot::count();
        return response()->json(["data"=>$arr , "total_slots"=>$total_slots]);
    }
    public function update(Request $request){
    
        $data = $request->all();
        $key= array_keys($data);
        $val = array_values($data);
        // $request->validate([
        //    $key[0] =>'required|numeric|gt:-1'
        // ]);
        $validator = Validator::make($data, [
            $key[0] => ['required', 'numeric','gt:-1'],
         ]);
         if($validator->fails()){
            return response()->json($validator->messages(), 200);
        }else{
            $field_col = substr($key[0], -1,1);
            $length = strpos($key[0], '_') - 5;
            $id = substr($key[0], 5 ,$length);
            $k = "field". $field_col;
            DB::table('slots')->where('id',$id)->update([$k => $val[0]]);
            return response()->json(['success'=>"successfully updated slot"]);        
        }     
    }
}
