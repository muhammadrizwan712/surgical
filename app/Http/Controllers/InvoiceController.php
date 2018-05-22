<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use App\Token;
use App\Serial;
use App\Customer;

class InvoiceController extends Controller
{
    public function create($id){
    	$customer=Customer::where('id',$id)->first();
$stk=Stock::where('customer_id',$id)->get();

return view('Invoice.create')->withstore($stk)->withcustomer($customer);
    	
    }
    public function getStore($id){
$customer=Customer::where('id',$id)->first();
$invoice=Stock::where('customer_id',$id)->get();
//dd($invoice);
return view('Invoice.store')->withstore($invoice)->withcustomer($customer);

    }
    public function postStore(Request $request){

$customer=Customer::where('id',$request->id)->first();

$token=Token::where('id',$customer->token_id)->first();
$token->status=null;

$token->update();



return redirect()->route('create.invoice', ['id' => $request->id]);

    }
}
