@extends('Dashboard/dashboard')

@section('content')


<div class="table-responsive"  data-example-id="contextual-table" >
    <button class="btn btn-primary pull-right" onclick="printContent('divide')">print</button>	

    <center><h2 style="color: red;margin-top: 10px">MAIN INDUSTRY SURGICAL</h2></center>
    <div id="divide">
      
    <table class="table" id="example">
      <thead>
        <tr>
          
             <th>id</th>
               <th>Product Name</th>
               <th>Product Quantity</th>
               <th>Product Size</th>
               
             
               <th>Date</th>
              
               
               
               <th>Color</th>
               

<th>Finish It</th>



                
                        @if(Auth::User()->hasrole('admin'))
                
                <th>Action</th>
               @endif
                
          
        </tr>
      </thead>
      <tbody>
       
       
      
       
     
        
        
           @foreach($uncoat as $cls)
            <tr>
                <td>{{$cls->id}}</td>
                <td>{{$cls->pname}}</td>
                <td>{{$cls->pquantity}}</td>
                <td>{{$cls->psize}}</td>
             
               
                <td>{{$cls->date}}</td>
               
              
              
                <td>{{$cls->color->name}}</td>
                
                
             

              @if($cls->status_finish==null)
<td><h6 style="color: red"><input type="checkbox" name="finish" value="{{$cls->id}}"></h6></td>
@else

<td><h6 style="color: green"> <input type="checkbox" name="finish" checked="true" value="{{$cls->id}}"></h6></td>
           @endif





                        @if(Auth::User()->hasrole('admin'))
        
      
<td>
                <a href="" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</a>
             
               </td>
              @endif
            </tr>
           @endforeach
               
       
      </tbody>
    </table>
    </div>
    
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
var add='{{route('shift.finish')}}';

</script> 
@endsection