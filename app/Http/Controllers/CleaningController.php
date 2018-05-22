<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use App\Customer;
class CleaningController extends Controller
{
    public function clean(){
$Customer=Customer::all();
$clean=Stock::where('status_coating','!=',null)->get();
return view('Cleaning.clean')->withclean($clean)->withcustomer($Customer);


    }
    public function unClean(){
$Customer=Customer::all();
$unclean=Stock::whereNotNull('status_cleaning')->get();
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
