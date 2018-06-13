<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Invoice;
class CustomerController extends Controller
{
    public function getCustomer(){

$cus=Customer::where('type','sale credit')->get();
    	return view('Due.customer')->withcus($cus);
    }
    public function allInvoice($id){
$in=Invoice::where('customer_id',$id)->get();
return view('Invoice.Credit.invoice_list')->withinvoice($in);


    }
    public function search(Request $request){
$term=$request->term;
$cus=Customer::where('cname','like','%'.$term.'%')->get();
if(count($cus)==0){

	$serachResult[]='new name';
}
else{

	foreach ($cus as $key => $value) {
		$serachResult[]=$value->cname;
	}
}
return $serachResult;
//$cus=Customer::where('type','Sale Credit')->get();


    }
}
