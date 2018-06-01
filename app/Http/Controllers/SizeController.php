<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Size;
class SizeController extends Controller
{
  public function getSize(){

$items=Size::all();
   	return view('Size.create')->withsize($items);
   }
   public function postSize(Request $request){

$obj=new Size();
$obj->name=$request->name;
$obj->save();
return back();


   }
   public function delete($id){
$cm=Size::where('id',$id)->first();
$cm->delete();
return back();

}
public function edit(){

$rec=Size::where('id',$_POST['id'])->first();

$rec->name=$_POST['name'];
$rec->update();
return response($_POST['name']);

}
}
