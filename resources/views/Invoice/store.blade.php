@extends('Dashboard/dashboard')
@section('content')
<style type="text/css">
	.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: none;
}

body {
  
 

 
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 90px;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background: url(dimension.png);
}

#project {
  float: left;
}

#project span {
  color: #5D6975;
  text-align: right;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}

#company {
  float: right;
  text-align: right;
}

#project div,
#company div {
  white-space: nowrap; 
  margin-right: 10px;
  margin-left: 10px;       
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
}

table td {
  padding: 20px;
  text-align: right;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}
</style>
<style> 
input[type=text] {
   
    padding: 12px 20px;
    margin: 4px 0;
    box-sizing: border-box;
    border: none;
    border-bottom: 2px solid lightblue;
    
}
</style>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>save invoice</title>
    <link rel="stylesheet" href="style.css" media="all" />
  </head>
  <form action="{{route('poststore.invoice')}}" method="post"> 
  	<input type="hidden" name="id" value="{{$customer->id}}">
{{csrf_field()}}
  <body style="margin-left: : 15px;>
    <header class="clearfix">
      
      <h1 style="color: lightgreen">Save Invoice</h1>
      <div id="company" class="clearfix" style="margin-right: 40px">
        <div  style="color: blue">Main Instruments</div>
        <div>455 Foggy Heights,<br /> AZ 85004, US</div>
        <div  style="color: blue">(602) 519-0450</div>
        <div><a href="mailto:company@example.com">maininstruments@gmail.com</a></div>
      </div>
      <div id="project" style="margin-left: 40px">
        <div><span style="color: blue">Token</span>{{$customer->token->name}} </div>
        <div><span  style="color: blue">CLIENT</span> {{$customer->cname}}</div>
        <div><span  style="color: blue">Phone</span>{{$customer->cphone}}</div>
       
        <div><span  style="color: blue">DATE</span> {{$customer->date}}</div>
        
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr  style="background-color:#06d995;color: white">
            <th class="service">Id</th>
            <th class="service">Item Name</th>
            <th class="desc">Quantity</th>
            <th class="desc">Size</th>
            <th class="desc">Price</th>
            <th class="desc">Total</th>
          
           
          </tr>
        </thead>
        <tbody>
          @if($store!=null)
         @foreach($store as $in)
          <tr>
           <td class="service">{{$in->id}}</td>
           <td class="service">{{$in->product->name}}</td>
            <td class="desc">{{$in->pquantity}}</td>
            <td class="desc">{{$in->size->name}}</td>
            <td class="desc">{{$in->price}}</td>
            <td class="desc">{{$in->total}}</td>
           
            
          </tr>
        
          @endforeach
            @endif
          
         
        </tbody>
      </table>
       <div class="row">
    	<div class="col-md-4 col-md-offset-8">
    		Totel:<input type="text" name="" value="{{$customer->grandtotal}}"><br>
         Disc:<input type="text" name=""><br>
         <button class="btn btn-primary">Reciept</button>
    	</div>
    </div>
    </main>
    <footer>
   
    </footer>
  </body>
    </form>
</html>
@endsection