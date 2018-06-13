@extends('Dashboard/dashboard')

@section('content')
<div class="row">
	<div class="col-md-12">
		

		  <div style="background-color: white">
    <br><br>
  
  <h2 style="text-align: center;color:  blue">CREDIT CUSTOMERS</h2>


<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
              <th>Customer</th>
                <th>Phone</th>
                <th>GP Number</th>
                <th>Invoices</th>
                       
               
               
                
            </tr>
        </thead>
       
        <tbody>
          @foreach($cus as $cls)
            <tr>

                
                <td>{{$cls->cname}}</td>
                <td>{{$cls->cphone}}</td>
                <td>{{$cls->rnumber}}</td>
                <td><a href="{{route('all.invoice',$cls->id)}}"><button class="btn btn-primary">Invoices</button></a></td>
                       

            </tr>
           @endforeach
        </tbody>
    </table>

<script type="text/javascript">
  
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script type="text/javascript" src="{{asset('js/Color/update.js')}}"></script>
<script type="text/javascript">
var token='{{Session::token()}}';
var add='{{route('edit.size')}}';

</script> 
</div>
	</div>

</div>


@endsection
