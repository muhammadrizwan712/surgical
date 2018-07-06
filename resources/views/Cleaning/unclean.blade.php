@extends('Dashboard/dashboard')

@section('content')

<h2 style="color: green;text-align: center;"> <b>Unclean Stock List</h2>
<table class="table table-hover" style="margin:10px">
    <thead style="background-color:white">
       
    </thead>
<tbody>

     @foreach($customer as $orders) 
 
       <td>

         <h6 style="color: blue">Token:{{$orders->token->name}}</h6>
         <h6 style="color: blue">Name:{{$orders->cname}}</h6>
       <h6 style="color: red">phone:{{$orders->cphone}}</h6>
        <h6 style="color: green">Advance:{{$orders->advance}}</h6>
       <p style="color: brown">Date:<small>{{$orders->date}}</small></p>
       <br>
            
            </td>

<td> <a href="" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</a></td>


 
 
           
            <tr>
           
             <th>id</th>
               <th>Item Name</th>
               <th>Quantity</th>
               <th>Size</th>
              
               
              
              
              
              
               <th>Color</th>
               <th>Location</th>
              
<th>Status Cleaning</th>
<th>Status Coating</th>
<th>Status Finish</th>



                
                        @if(Auth::User()->hasrole('admin'))
                
                <th>Action</th>
               @endif
                
          
        </tr>

            @foreach($unclean as $cls)

@if($cls->customer_id==$orders->id)

            <tr>
                <td>{{$cls->id}}</td>
                <td>{{$cls->product->name}}</td>
                <td>{{$cls->pquantity}}</td>
                <td>{{$cls->product->name}}</td>
                
               
               
                
             
                
                <td>{{$cls->color->name}}</td>
                <td>{{$cls->serial->name}}</td>
            @if($cls->status_cleaning==null)
               <td><input type="checkbox" name="shiftcleaning"></td>
               @else
               <td><h6 style="color: red">In Cleaning</h6> </td>
@endif

              @if($cls->status_coating==null)
               <td><input type="checkbox" name="shiftcoating" value="{{$cls->id}}"></td>

@else

               <td><input type="checkbox" name="shiftcoating" checked="true" value="{{$cls->id}}"></td>

              
               @endif
              @if($cls->status_finish==null)
<td><h6 style="color: red"> Not finished</h6></td>
@else

<td><h6 style="color: green"> Finished</h6></td>
           @endif



                        @if(Auth::User()->hasrole('admin'))
        
      
<td>
                <a href="" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</a>
                <a href="{{route('getstore.invoice',$cls->id)}}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-wrench"></i> invoice</a>
             
               </td>
              @endif
            </tr>
            @endif
           @endforeach
               
            

        


@endforeach
    </tbody>
    
  
</table>
<script type="text/javascript">
  
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
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

<script type="text/javascript" src="{{asset('js/Stock/update.js')}}"></script>

<script type="text/javascript">
var token='{{Session::token()}}';
var add='{{route('shift.coating')}}';

</script> 
@endsection