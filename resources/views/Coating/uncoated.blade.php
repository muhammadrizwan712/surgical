@extends('Dashboard/dashboard')

@section('content')

<h2 style="color: green;text-align: center;"> <b>Uncoated List</h2>
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
               <th>Product Name</th>
               <th>Product Quantity</th>
               <th>Product Size</th>
               
               <th>Color</th>
               <th>Serial Number</th>
              
<th>Cleaning</th>
<th> Coating</th>
<th>Status Finish</th>

     @if(Auth::User()->hasrole('admin'))
                
                <th>Action</th>
               @endif
                
          
        </tr>

           @foreach($uncoat as $cls)

@if($cls->customer_id==$orders->id)

            <tr>
                <td>{{$cls->id}}</td>
                <td>{{$cls->pname}}</td>
                <td>{{$cls->pquantity}}</td>
                <td>{{$cls->psize}}</td>
  
                <td>{{$cls->color->name}}</td>
                <td>{{$cls->serial->name}}</td>
                <td><h6 style="color: green">Cleaned</h6></td>
              @if($cls->status_finish==null)
<td><h6 style="color: red"><input type="checkbox" name="finish" value="{{$cls->id}}"></h6></td>
@else

<td><h6 style="color: green"> <input type="checkbox" name="finish" checked="true" value="{{$cls->id}}"></h6></td>
           @endif
            @if($cls->status_finish==1)
<td><h6 style="color: green">Finished</h6></td>
@else

<td><h6 style="color: red"> UnFinished</h6></td>
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
var add='{{route('shift.finish')}}';

</script> 
@endsection