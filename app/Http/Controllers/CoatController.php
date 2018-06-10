<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use App\Serial;
use App\Customer;
class CoatController extends Controller
{
     public function coat(){
$Customer=Customer::whereNull('status_invoice')->get();
     
$uncoat=Stock::where('status_finish','!=',null)->get();
return view('Coating.coated')->withcoat($uncoat)->withcustomer($Customer);


    }
    public function unCoat(){
     	$customer=Customer::whereNull('status_invoice')->get();

$uncoat=Stock::whereNotNull('status_coating')->whereNull('status_finish')->get();
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
