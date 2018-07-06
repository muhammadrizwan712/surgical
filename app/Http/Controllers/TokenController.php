<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Token;
use Session;
class TokenController extends Controller
{
   public function create(){

$cm=Token::all();
Session::flash('flash_success','token created successfully');

	return view('Token.create')->withtoken($cm);
}

public function store(Request $request){
$cm=new Token();
$cm->name=$request->name;
$cm->save();
return back();

}
public function delete($id){
$cm=Token::where('id',$id)->first();
Session::flash('flash_success','token deleted successfully');
$cm->delete();
return back();

}
public function edit(){

$rec=Token::where('id',$_POST['id'])->first();

$rec->name=$_POST['name'];
$rec->update();
return response($_POST['name']);

}
}
