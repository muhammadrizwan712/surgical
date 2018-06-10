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
$invoice=Stock::where('customer_id',$id)->where('date','=',$customer->date)

->get();
//dd($invoice);
return view('Invoice.store')->withstore($invoice)->withcustomer($customer);

    }
    public function postStore(Request $request){

$customer=Customer::where('id',$request->id)->first();

$customer->status_invoice=1;
$customer->update();
$token=Token::where('id',$customer->token_id)->first();
$token->status=null;
$invoice=new Invoice();
$invoice->customer_id=$customer->id;
$invoice->total=$request->total;
$invoice->date=$request->date;
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


$remaing_between_date=Invoice::where('customer_id','=',$request->customer)->
whereBetween('date', [$request->fromdate, $request->todate])
->sum('balance');
$advance_between_date=Invoice::where('customer_id','=',$request->customer)->
whereBetween('date', [$request->fromdate, $request->todate])
->sum('advance');
$recieve_between_date=Invoice::where('customer_id','=',$request->customer)->
whereBetween('date', [$request->fromdate, $request->todate])
->sum('recieve');
$remaing_all=Invoice::where('customer_id','=',$request->customer)->sum('balance');
$stock_total_between_date=Stock::where('customer_id','=',$request->customer)->
whereBetween('date', [$request->fromdate, $request->todate])
->sum('total');
$previous_balance=$remaing_all-$remaing_between_date;

$current_balance=$stock_total_between_date+$previous_balance-$advance_between_date-$recieve_between_date;


if($cust==null)
{
Session::flash('flash_message','Please Generate Reciept before report');
	return back();

}
$pr=Stock::where('customer_id','=',$request->customer)->
whereBetween('date', [$request->fromdate, $request->todate])
->get();
//$pr=Stock::where('customer_id','=',$request->customer)->get();
//  dd($pr);

return view('Invoice.Customer.report')->withcustomer($cust)->withstore($pr)->withpreviousbalance($previous_balance)->withcurrentbalance($current_balance)->withstocktotal($stock_total_between_date)->withadvance($advance_between_date)->withtotalrecieve($recieve_between_date);

    }
}
