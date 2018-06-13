@extends('Dashboard/dashboard')

@section('content')
<div class="row">
  <style type="text/css">
    input[type=text] {
   
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    border-bottom: 2px solid lightgreen;
    
}
  </style>
	<div class="col-md-12">
		

		  <div style="background-color: white">
    <br><br>
  
 
<form action="{{route('post.recieve.it')}}" method="post" >
  {{csrf_field()}}


<div class="col-md-7 col-md-offset-4">
   <h2 style="color:  blue">Recieve Payment</h2>
  <div class="col-md-12">
    Name:
    <input type="text" name="" name="name" readonly="true" value="{{$rec->customer->cname}}">

  </div>
  <input type="hidden" name="customerid" value="{{$rec->customer_id}}">
  <input type="hidden" name="invoice_id" value="{{$rec->id}}">
  <div class="col-md-12">
    Total:
    <input type="text" name="" name="Total" readonly="true" value="{{$rec->total}}Rs">
  </div>
  <div class="col-md-12">
    Recieve:
    <input type="text" name="" name="Recieve" readonly="true" value="{{$rec->recieve}}Rs">
  </div>
  <div class="col-md-12">
    Advance:
    <input type="text" name="" name="Advance" readonly="true" value="{{$rec->advance}}Rs">
  </div>
  <div class="col-md-12">
    Remaing: 
    <input type="text" name="due" value="{{$rec->balance}}">
  </div>
   <div class="col-md-12" style="margin-top: 22px">
    <button class="btn btn-primary">Update</button>
  </div>
</div>

</form>

</div>
	</div>

</div>


@endsection
