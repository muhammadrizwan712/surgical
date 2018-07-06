<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use yajra\Datatables\Datatables;
use App\Token;
use App\Serial;
class HomeController extends Controller
{
    
    private $extra=null;
    public function __construct()
    {
        $this->middleware('auth');
    }

    
   
    public function index()
    {
        
$token=Token::wherenull('status')->count();
$serial=Serial::wherenull('status')->count();
        return view('Dashboard.dashboard')->withextra($this->extra)->withtoken($token)->withrac($serial);
        
    }
    
}
