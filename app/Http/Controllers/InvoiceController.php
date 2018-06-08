<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use App\Token;
use App\Serial;
use App\Customer;
use App\Invoice;
use App\Product;
use Session;
class InvoiceController extends Controller
{
    public function create($id){
    	$customer=Customer::where('id',$id)->first();
$stk=Stock::where('customer_id',$id)->get();
$prices=Invoice::where('customer_id','=',$id)->first();

return view('Invoice.create')->withstore($stk)->withcustomer($customer)->withprices($prices);
    	
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
$invoice=new Invoice();
$invoice->customer_id=$customer->id;
$invoice->total=$request->total;
$invoice->advance=$request->advance;
$invoice->recieve=$request->recieve;
$invoice->balance=$request->balance;
$invoice->save();



$token->update();



return redirect()->route('create.invoice', ['id' => $request->id]);

    }
    public function getCustomerInvoice(){
    $cust=Customer::all();	

return view('Invoice.Customer.create')->withcustomer($cust);
    	
    }
    public function postCustomerInvoice(Request $request){
$cust=Customer::where('id',$request->customer)->first();
$prices=Invoice::where('customer_id','=',$request->customer)->first();
if($prices==null)
{
Session::flash('flash_message','Please Generate Reciept before report');
	return back();

}
//$pr=Stock::where('customer_id','=',$request->customer)->
//whereBetween('created_at', [$request->fromdate, $request->todate])
//->get();
$pr=Stock::where('customer_id','=',$request->customer)->get();
//  dd($pr);

return view('Invoice.create')->withcustomer($cust)->withstore($pr)->withprices($prices);

    }
}
