


<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Invoice</title>
	<link rel="stylesheet" href="{{asset('dashboard/css/bootstrap2.css')}}">
	<style>
	@import url(http://fonts.googleapis.com/css?family=Bree+Serif);
	body, h1, h2, h3, h4, h5, h6{
		font-family: 'Bree Serif', serif;
	}
	</style>
</head>
<body>
	

	<div class="container" id="divide">

	
		<div class="row">

			<div class="col-xs-6">
			  <h1>
			    <a href="">
			    <!--   <img src="logo.png"> -->
			      Customer Name:<p style="color: black">{{$customer->cname}}</p>
			    </a>
			  </h1>
			</div>
			<div class="col-xs-6 text-right">
			  <h1>COATING INVOICE</h1>
			  <h1><small> Invoice #{{$customer->id}}</small></h1>
			</div>
		</div>

		  <div class="row">
		   
		    <div class="col-xs-10 col-xs-offset-2 text-right">
		      <div class="panel panel-default">
		              <div class="panel-heading">
		              <center>  <h4>Customer Name : <a href="#"> {{$customer->cname}}</a></h4></center>
		              </div>
		              <div class="panel-body">
		               <center>
		                <p>
		              Customer Phone# {{$customer->cphone}} <br>
		                </p></center>
		              </div>
		            </div>
		    </div>
		  </div> <!-- / end client details section -->

		         <table class="table table-bordered">
        <thead>
          <tr>
            <th><h4>id</h4></th>
            <th><h4>Item Name</h4></th>
            <th><h4>quantity</h4></th>
            <th><h4>size</h4></th>
            <th><h4>price</h4></th>
            <th><h4>total</h4></th>

          
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

		<div class="row text-right">
			<div class="col-xs-2 col-xs-offset-8">
				<p>
					<strong>
						Sub Total : <br>
						TAX :<br>
						Total : <br>
					</strong>
				</p>
			</div>
			<div class="col-xs-2">
				<strong>
					{{$customer->grandtotal}}Rs <br>
					N/A <br>
					{{$customer->grandtotal}}Rs <br>
				</strong>
			</div>
		</div>


		<div class="row">
		  <div class="col-xs-5">
		    <div class="panel panel-info">
			  <div class="panel-heading">
			    <h4>Print Preview</h4>
			  </div>
			  <div class="panel-body">
			    <p><button class="btn btn-primary " onclick="printContent('divide')">print</button></p>
			   
			  </div>
			</div>
		  </div>
		  <div class="col-xs-7">
		   <div class="span7">
			  <div class="panel panel-info">
			    <div class="panel-heading">
			      <h4>Go To Home</h4>
			    </div>
			    <div class="panel-body">
			      <p>
			        <p><a href="/home"><button class="btn btn-danger ">Home</button></a></p>
			      </p>
			     <!--  <h4>Payment should be mabe by Bank Transfer</h4> -->
			    </div>
			  </div>
			</div>
		  </div>
		</div>

	</div>

</body>
<script type="text/javascript">

function printContent(el){

var restorpage=document.body.innerHTML;
var printcontent=document.getElementById(el).innerHTML;

document.body.innerHTML=printcontent;
window.print();
document.body.innerHTML=restorpage;
window.close();
}
$('#saveOffer').click(function () {
  window.history.pushState('forward', null, '/');
  setTimeout(function () {
    window.location.reload();
},1000);
});

</script>

</html>
