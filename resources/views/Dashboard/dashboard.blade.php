
<!DOCTYPE HTML>
<html>
<head>
<title>dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="school system " />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="{{asset('dashboard/css/bootstrap.min.css')}}" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="{{asset('dashboard/css/style.css')}}" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="{{asset('dashboard/css/lines.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('dashboard/css/font-awesome.css')}}" rel="stylesheet"> 
<!-- jQuery -->
<script src="{{asset('dashboard/js/jquery.min.js')}}"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Nav CSS -->
<link href="{{asset('dashboard/css/custom.css')}}" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="{{asset('dashboard/js/metisMenu.min.js')}}"></script>
<script src="{{asset('dashboard/js/custom.js')}}"></script>
<!-- Graph JavaScript -->
<script src="{{asset('dashboard/js/d3.v3.js')}}"></script>
<script src="{{asset('dashboard/js/rickshaw.js')}}"></script>
 <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">


</head>
<body>
<div id="wrapper">
     <!-- Navigation -->
        <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">{{Auth::user()->name}}</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-comments-o"></i><span class="badge">4</span></a>
              <ul class="dropdown-menu">
            <li class="dropdown-menu-header">
              <strong>Messages</strong>
              <div class="progress thin">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                  <span class="sr-only">40% Complete (success)</span>
                </div>
              </div>
            </li>
            <li class="avatar">
              <a href="#">
                <img src="{{asset('dashboard/images/1.png')}}" alt=""/>
                <div>New message</div>
                <small>1 minute ago</small>
                <span class="label label-info">NEW</span>
              </a>
            </li>
            <li class="avatar">
              <a href="#">
                <img src="images/2.png" alt=""/>
                <div>New message</div>
                <small>1 minute ago</small>
                <span class="label label-info">NEW</span>
              </a>
            </li>
            <li class="avatar">
              <a href="#">
                <img src="images/3.png" alt=""/>
                <div>New message</div>
                <small>1 minute ago</small>
              </a>
            </li>
            <li class="avatar">
              <a href="#">
                <img src="images/4.png" alt=""/>
                <div>New message</div>
                <small>1 minute ago</small>
              </a>
            </li>
            <li class="avatar">
              <a href="#">
                <img src="images/5.png" alt=""/>
                <div>New message</div>
                <small>1 minute ago</small>
              </a>
            </li>
            <li class="avatar">
              <a href="#">
                <img src="images/pic1.png" alt=""/>
                <div>New message</div>
                <small>1 minute ago</small>
              </a>
            </li>
            <li class="dropdown-menu-footer text-center">
              <a href="#">View all messages</a>
            </li> 
              </ul>
            </li>
          <li class="dropdown">
              <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"><img src="{{asset('dashboard/images/1.png')}}"><span class="badge">9</span></a>
              <ul class="dropdown-menu">
          
             <li class="dropdown">
                                

                                
                                    <li  class="m_2">
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                               
                            </li>

              </ul>
            </li>
      </ul>
      <form class="navbar-form navbar-right">
              <input type="text" class="form-control" value="Search..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search...';}">
            </form>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="#"><i class="fa fa-dashboard fa-fw nav_icon"></i>Dashboard</a>
                        </li>

 
                        @if(Auth::User()->hasrole('cleaning'))
                         <li>
                            <a href="#"><i class="fa fa-laptop nav_icon"></i>Stocks<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               
                                <li>
                                    <a href="{{route('get.clean')}}">View Clean Stock</a>
                                </li>
                                <li>
                                    <a href="{{route('get.unclean')}}">View Unclean Stock</a>
                                </li>
                               
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         
                        @endif
                        @if(Auth::User()->hasrole('coating'))
                         <li>
                            <a href="#"><i class="fa fa-laptop nav_icon"></i>Stocks<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               
                                <li>
                                    <a href="{{route('get.coat')}}">View coated Stock</a>
                                </li>
                                <li>
                                    <a href="{{route('get.uncoat')}}">View Uncoated Stock</a>
                                </li>
                               
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         
                        @endif
                   
                        @if(Auth::User()->hasrole('admin'))
                           <li>
                            <a href="#"><i class="fa fa-laptop nav_icon"></i>Product Price<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('get.product')}}">Add Items</a>
                                </li>
                               <li>
                                    <a href="{{route('get.size')}}">Add Size</a>
                                </li>
                                <li>
                                    <a href="{{route('get.product.price')}}">Set Price</a>
                                </li>
                               
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         <li>
                            <a href="#"><i class="fa fa-laptop nav_icon"></i>Invoice Generate<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('get.customer.invoice')}}">Customer Report</a>
                                </li>
                               <li>
                                    <a href="{{route('get.size')}}">Summery Report</a>
                                </li>
                                
                               
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         <li>
                            <a href="#"><i class="fa fa-laptop nav_icon"></i>Stocks<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('create.stock')}}">Entry Stock</a>
                                </li>
                                <li>
                                    <a href="{{route('view.stock')}}">View Stock</a>
                                </li>
                               
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                          <li>
                            <a href="#"><i class="fa fa-laptop nav_icon"></i>Color<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('create.color')}}">Color Management</a>
                                </li>
                               
                               
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         <li>
                            <a href="#"><i class="fa fa-laptop nav_icon"></i>Token<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('create.token')}}">Token Management</a>
                                </li>
                               
                               
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

<li>
                            <a href="#"><i class="fa fa-laptop nav_icon"></i>Location <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('create.serial')}}">Location Management</a>
                                </li>
                               
                               
                            </ul>
                            <!-- /.nav-second-level -->
                        </li> 
                        <li>
                            <a href="#"><i class="fa fa-laptop nav_icon"></i>Payment Managment <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('due.list')}}">Due List</a>
                                </li>
                                <li>
                                    <a href="{{route('get.customer')}}">Credit Customer</a>
                                </li>
                               
                               
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>                        @endif
                       
  
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
    
        </nav>
        <div id="page-wrapper">
      


@yield('content')
    
  
   
    
    </div>
 
       </div>
 

      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
    <!-- Bootstrap Core JavaScript -->
    <link rel="stylesheet" href="{{asset('dashboard/css/clndr.css')}}" type="text/css" />
            <script src="{{asset('dashboard/js/underscore-min.js')}}" type="text/javascript"></script>
            <script src= "{{asset('dashboard/js/moment-2.2.1.js')}}" type="text/javascript"></script>
            <script src="{{asset('dashboard/js/clndr.js')}}" type="text/javascript"></script>
            <script src="{{asset('dashboard/js/site.js')}}" type="text/javascript"></script>
    <script src="{{asset('dashboard/js/bootstrap.min.js')}}"></script>
     <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
</body>
</html>
