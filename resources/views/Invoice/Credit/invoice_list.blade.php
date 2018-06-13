@extends('Dashboard/dashboard')

@section('content')
<div class="row">
	<div class="col-md-12">
		

		  <div style="background-color: white">
    <br><br>
  
  <h2 style="text-align: center;color:  blue">INVOICE LIST</h2>


<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
              <th>id</th>
              <th>Total</th>
                <th>Advance</th>
                <th>Recieve</th>
                <th>Remaing</th>
                 <th>Date</th>      
               <th>More</th>
               
                
            </tr>
        </thead>
       
        <tbody>
          @foreach($invoice as $cls)
            <tr>

                <td>{{$cls->id}}</td>
                <td>{{$cls->total}}</td>
                <td>{{$cls->advance}}</td>
                <td>{{$cls->recieve}}</td>
                <td>{{$cls->balance}}</td>
                <td>{{$cls->date}}</td>
                <td><a href="{{route('recieve.detail',$cls->id)}}"><button class="btn btn-success">More</button></a></td>
                       

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
