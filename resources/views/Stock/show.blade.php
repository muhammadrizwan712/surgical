@extends('Dashboard/dashboard')

@section('content')
@include('message')
<h2 style="color: green;text-align: center;"> <b>Stock List</h2>
<table class="table table-hover" style="margin:10px">
    <thead style="background-color:white">
       
    </thead>
<tbody >

     @foreach($customer as $orders) 
 
       <td>

         <h6 style="color: blue">Token:{{$orders->token->name}}</h6>
         <h6 style="color: blue">Name:{{$orders->cname}}</h6>
       <h6 style="color: red">phone:{{$orders->cphone}}</h6>
        <h6 style="color: green">Advance:{{$orders->advance}}</h6>
       <p style="color: brown">Date:<small>{{$orders->date}}</small></p>
       <br>
            
            </td>
                        @if(Auth::User()->hasrole('admin'))

<td> <a href="{{route('remove.customer',$orders->id)}}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</a></td>
@endif
<td><a href="{{route('getstore.invoice',$orders->id)}}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-wrench"></i> invoice</a>
</td>
  <td >
    <a href="{{route('initial.print',$orders->id)}}" class="btn btn-xs btn-danger pull-right "><i class="glyphicon glyphicon-print"></i>Print</a>

    
</td>

 
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

           @foreach($stock as $cls)
@if($cls->date==$orders->date)
@if($cls->customer_id==$orders->id)

            <tr>
                <td>{{$cls->id}}</td>
                <td>{{$cls->product->name}}</td>
                <td>{{$cls->pquantity}}</td>
                <td>{{$cls->size->name}}</td>
                
              <td>{{$cls->color->name}}</td>
                <td>{{$cls->serial->name}}</td>
             
              @if($cls->status_cleaning==null)
               <td><input type="checkbox" name="shiftcleaning" value="{{$cls->id}}"></td>
               @elseif($cls->status_coating==null)
               <td style="color: red">in cleaning</td>
               @else
               <td style="color: green">Cleaned</td>
@endif

              @if($cls->status_coating==null)
<td><h6 style="color: red">Not  in coating</h6></td>
@elseif($cls->status_finish==null)

<td><h6 style="color: red"> In coating</h6></td>
   @else
<td><h6 style="color: green">Coated</h6></td>

               @endif
              @if($cls->status_finish==null)
<td><h6 style="color: red"> Not finished</h6></td>
@else

<td><h6 style="color: green"> Finished</h6></td>
           @endif





                        @if(Auth::User()->hasrole('admin'))
        
      
<td>
                <a href="{{route('product.delete',$cls->id)}}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</a>
                
             
               </td>
              @endif
            </tr>
            @endif
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
var add='{{route('shift.cleaning')}}';

</script> 
@endsection