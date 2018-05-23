<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use App\Serial;
use App\Token;
use App\Color;
use App\Size;
use App\Product;
use App\ProductSize;
use App\Customer;
use Session;
class StockController extends Controller
{
	private $extra=null;
	private $serial;
	public function shiftCleaning(){



$rec=Stock::where('id',$_POST['orderid'])->first();

$rec->status_cleaning=1;
$rec->update();
return response("order shifted to cleaning");



	}
	public function getPrice(Request $request){
  
$price=ProductSize::select('price')->where('product_id','=',$request->pid)->where('size_id','=',$request->sid)->first();
return response($price);
	}
    public function create(){

$color=Color::all();
$product=Product::all();
$size=Size::all();

    	return view('Stock.create2')->withextra($this->extra)->withcolor($color)->withpname($product)->withsize($size);
    }
    public function store(Request $request){

$cus=new Customer();
$cus->cname=$request->cname;
$cus->cphone=$request->cphone;
$cus->date=$request->date;
$cus->advance=$request->advance;
$cus->rnumber=$request->rnumber;
$cus->grandtotal=$request->grandtotal;
$token=Token::where('status','=',Null)->first();
//dd($token);
if($token==null){

Session::flash('flash_message','Token Finished');
	return back();
}
$cus->token_id=$token->id;
$cus->save();
//block token
$status=Token::where('id',$token->id)->first();
$status->status=null;
$status->update();
$id=$cus->id;

foreach($request->pcolor as $key=>$v){
//assign location to products
//dd($v);
$serialall=Serial::where('color_id','=',$v)->whereNull('status')->first();

if($serialall==null){
	Session::flash('flash_message','Rack Filled');
	return back();
}
$this->serial=$serialall->id;
$serialid=$this->serial;
//dd($serialid);

//dd($request->pcolor[$key]);

$data=array(
		'product_id'=>$request->pname [$key],
		'pquantity'=>$request->pquantity [$key],
		'size_id'=>$request->psize [$key],
'color_id'=>$request->pcolor [$key],
'price'=>$request->price [$key],
'total'=>$request->total [$key],
'customer_id'=>$id,
'serial_id'=>$serialid

);
Stock::insert($data);

//update serial null to block

$serialall->status=1;
$serialall->update();






}
return back();


    }

public function show(){
$customer=Customer::all();
$stock=Stock::all();

return view('Stock.show')->withstock($stock)->withcustomer($customer);


}

}
