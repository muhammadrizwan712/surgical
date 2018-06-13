@extends('Dashboard/dashboard')

@section('content')
<div class="row">
	<div class="col-md-12">
		

		  <div style="background-color: white">
    <br><br>
  
  <h2 style="text-align: center;color:  blue">Due List</h2>


<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
              <th>Customer Name</th>
              <td>Customer Phone</td>
                <th>Total</th>
                <th>Advance</th>

                <th>Recieve</th>
                       <th>Due</th>
                       <td>Date</td>
               
               
                
            </tr>
        </thead>
       
        <tbody>
          @foreach($invoice as $cls)
            <tr>

                
                <td>{{$cls->customer->cname}}</td>
                <td>{{$cls->customer->cphone}}</td>
                <td>{{$cls->total}}</td>
                <td>{{$cls->advance}}</td>
                <td>{{$cls->recieve}}</td>
                <td>{{$cls->balance}}</td>
                <td>{{$cls->date}}</td>
                <td><a href="{{route('recieve.it',$cls->id)}}"><button class="btn btn-success">Recieve</button></a></td>
                       

            </tr>
           @endforeach
        </tbody>
    </table>

<script type="text/javascript">
  
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>


</div>
	</div>

</div>


@endsection
