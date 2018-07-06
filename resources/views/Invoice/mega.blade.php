@extends('Dashboard/dashboard')
@section('content')
<div class="col-md-12">
	<h3 style="color: green;text-align: center;">MEGA REPORT</h3>
	<form action="{{route('mega.report')}}">	
{{csrf_field()}}
<input type="date" class="col-md-4"  name="fromdate" >
<input type="date" name="todate" class="col-md-4">
<button class="btn btn-primary">report</button>
</form>

</div>

@if($totalrecieve!=null)
@if($totaldiscount!=null)


<div class="col-md-12" style="margin-top: 50px">
	<div class="col-md-6">
		Total Recieve Payment<p style="color: green">{{$totalrecieve}}Rs</p>
	</div>
	<div class="col-md-6">
		Total Discount Payment<p style="color: red">{{$totaldiscount}}Rs</p>
	</div>

	
	
</div>
@endif
@endif
@endsection