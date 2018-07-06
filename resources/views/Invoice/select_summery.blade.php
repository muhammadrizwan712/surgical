@extends('Dashboard/dashboard')
@section('content')
<div class="col-md-12">
	<h3 style="color: green;text-align: center;">SUMMERY REPORT</h3>
	<form action="{{route('summery.report')}}">	
{{csrf_field()}}
<input type="date" class="col-md-4"  name="fromdate" >
<input type="date" name="todate" class="col-md-4">
<button class="btn btn-primary">report</button>
</form>

</div>


@endsection