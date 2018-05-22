<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use App\Serial;
use App\Customer;
class CoatController extends Controller
{
     public function coat(){
     	$customer=Customer::all();
$uncoat=Stock::where('status_finish','!=',null)->get();
return view('Coating.coated')->withcoat($uncoat)->withcustomer($customer);


    }
    public function unCoat(){
     	$customer=Customer::all();

$uncoat=Stock::whereNotNull('status_coating')->get();
return view('Coating.uncoated')->withuncoat($uncoat)->withcustomer($customer);


    }
    public function shiftFinish(){


$rec=Stock::where('id',$_POST['orderid'])->first();
$rec->status_finish=1;


$serial=Serial::where('id',1)->first();
$serial->status=null;
$serial->update();
$rec->update();

//return response($serial);
return response("product coated successfully");
    }
}
