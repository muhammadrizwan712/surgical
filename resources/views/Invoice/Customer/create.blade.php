@extends('Dashboard/dashboard')
@section('content')
@include('message')
<form method="post" action="{{route('post.customer.invoice')}}">
	
{{csrf_field()}}
<div class="col-md-12">
	<center><h3>Customer Invoices</h3></center>
	<div class="col-md-3">
		<select name="customer" class="form-control">
			@foreach($customer as $cus)
			<option value="{{$cus->id}}" name="customer"> 
				{{$cus->cname}}
			</option>
@endforeach
		</select>
	</div>
	<div class="col-md-3">
		<input type="date" name="fromdate">
	</div>
	<div class="col-md-3">
		<input type="date" name="todate">
	</div>
	<div class="col-md-3">
		<button class="btn btn-primary">Report</button>
	</div>
	
</div>
</form>
@endsection