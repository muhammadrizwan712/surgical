<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductSize;
use App\Size;
class PriceController extends Controller
{
   public function getProduct(){

$items=Product::all();
   	return view('Product.create')->withproduct($items);
   }
   public function postProduct(Request $request){

$obj=new Product();
$obj->name=$request->name;
$obj->save();
return back();


   }
   public function delete($id){
$cm=Product::where('id',$id)->first();
$cm->delete();
return back();

}
public function edit(){

$rec=Product::where('id',$_POST['id'])->first();

$rec->name=$_POST['name'];
$rec->update();
return response($_POST['name']);

}

public function getProductPrice(){
$productSize=ProductSize::all();
$product=Product::all();
$size=Size::all();
return view('Price.create')->withproductsize($productSize)->withproduct($product)->withsize($size);


}
public function postProductPrice(Request $request){
$obj=new ProductSize();
$obj->product_id=$request->productid;
$obj->size_id=$request->sizeid;
$obj->price=$request->price;
$obj->save();
return back();

}
public function deleteProductPrice($id){
$obj=ProductSize::where('id',$id)->first();
$obj->delete();

return back();

}

public function editProductPrice(){


$rec=ProductSize::where('id',$_POST['id'])->first();

$rec->price=$_POST['name'];
$rec->update();
return response($_POST['name']);
}


}
