<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serial;
use App\Color;
class SerialController extends Controller
{
   public function create(){
   	$color=Color::all();
   	$serial=Serial::all();
return view('Serial.create')->withcolor($color)->withserial($serial);

   }
   public function store(Request $request){
$serial=new Serial();
$serial->name=$request->name;
$serial->color_id=$request->colorid;
$serial->save();
return back();


   }
  public function edit(){

$rec=Serial::where('id',$_POST['id'])->first();

$rec->name=$_POST['name'];
$rec->update();
return response($_POST['name']);

}
public function delete($id){
$cm=Serial::where('id',$id)->first();
$cm->delete();
return back();

}
}
