@extends('Dashboard/dashboard')

@section('content')
<div class="row">
	<div class="col-md-12">
		

		  <div style="background-color: white">
    <br><br>
  
  <h2 style="text-align: center;color:  blue">Payment Detail</h2>


<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
              <th>Invoice id</th>
              <th>Recieve</th>
                <th>Date</th>
                
               
                
            </tr>
        </thead>
       
        <tbody>
          @foreach($detail as $cls)
            <tr>

                <td>{{$cls->invoice_id}}</td>
                <td>{{$cls->recieve}}</td>
                <td>{{$cls->created_at}}</td>
                
               
                       

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
