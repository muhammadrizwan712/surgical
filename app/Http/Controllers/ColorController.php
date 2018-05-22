<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Color;
class ColorController extends Controller
{
 public function create(){

$cm=Color::all();
	return view('Color.create')->withcolor($cm);
}

public function store(Request $request){
$cm=new Color();
$cm->name=$request->name;
$cm->save();
return back();

}
public function delete($id){
$cm=Color::where('id',$id)->first();
$cm->delete();
return back();

}
public function edit(){

$rec=Color::where('id',$_POST['id'])->first();

$rec->name=$_POST['name'];
$rec->update();
return response($_POST['name']);

}
}
