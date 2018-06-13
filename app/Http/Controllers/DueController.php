<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\RecieveDetail;
class DueController extends Controller
{
    public function create(){
$invoice=Invoice::where('balance','!=',0)->get();

    	return view('Due.duelist')->withinvoice($invoice);
    }

    public function recieve($id){

$invoice=Invoice::where('id',$id)->first();
return view('Due.recieve')->withrec($invoice);

    }
    public function postRecieve(Request $request){
$invoice=Invoice::where('id',$request->invoice_id)->first();
$new=$request->due;

$get_recieve=$invoice->recieve;
$get_remaing=$invoice->balance;
$invoice->recieve=$get_recieve+$new;
$invoice->balance=$get_remaing-$new;
$invoice->update();
//recieving detail in customer account
$detail=new RecieveDetail();
$detail->invoice_id=$request->invoice_id;
$detail->recieve=$new;
$detail->save();
return back();


    }
    public function recieveDetail($id){
$recdet=RecieveDetail::where('invoice_id',$id)->get();
return view('Due.recievedetail')->withdetail($recdet);

    }
}
