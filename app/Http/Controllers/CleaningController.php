<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Stock;
use App\Customer;
class CleaningController extends Controller
{
    public function clean(){
$Customer=Customer::whereNull('status_invoice')->get();

$clean=Stock::where('status_coating','!=',null)->get();
return view('Cleaning.clean')->withclean($clean)->withcustomer($Customer);

 }
    public function unClean(){
$Customer=Customer::whereNull('status_invoice')->get();

$unclean=Stock::whereNotNull('status_cleaning')
->whereNull('status_coating')
->get();
//dd($unclean);
return view('Cleaning.unclean')->withunclean($unclean)->withcustomer($Customer);

    }

    public function shiftCoating(){
$rec=Stock::where('id',$_POST['orderid'])->first();
$rec->status_coating=1;
$rec->update();
return response("order shifted for coating");
    }
}
