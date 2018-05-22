<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use yajra\Datatables\Datatables;
class HomeController extends Controller
{
    
    private $extra=null;
    public function __construct()
    {
        $this->middleware('auth');
    }

    
   
    public function index()
    {
        

        return view('Dashboard.dashboard')->withextra($this->extra);
        
    }
    
}
