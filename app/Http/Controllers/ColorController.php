<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Color;
use Session;
class ColorController extends Controller
{
	public function delete($id){

$first=Color::where('id',$id)->first();
$first->delete();

Session::flash('flash_success',' Color delete Successfully');

return back();

	}
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

public function edit(){

$rec=Color::where('id',$_POST['id'])->first();

$rec->name=$_POST['name'];
$rec->update();
return response($_POST['name']);

}
}
