@extends('Dashboard/dashboard')

@section('content')
@include('message')

   <center>
    <button class="btn btn-success  " onclick="printContent('divide')"><i class="glyphicon glyphicon-print"></i>Tak Print</button></center>
 <div id="divide">
   

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




 
       <tr>
           
             <th>id</th>
               <th>Item Name</th>
               <th>Quantity</th>
               <th>Size</th> 
               <th>Color</th>
               <th>Location</th>
              
            
           
                       
          
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
          





                   
            </tr>
            @endif
            @endif
           @endforeach
               
            

        


@endforeach
    </tbody>
    
  
</table>
</div>
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