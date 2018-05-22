@extends('Dashboard/dashboard')
@section('content')
<style type="text/css">
	
	input[type=text] {
   
    padding: 8px 5px;
    margin: 4px 0;
    box-sizing: border-box;
    border: none;
    border-bottom: 2px solid lightblue;
    
}
input[type=date] {
   
    padding: 5px 7px;
    margin: 4px 0;
    box-sizing: border-box;
    border: none;
    border-bottom: 2px solid lightblue;
    
}

</style>	
</style>
<form role="form" method="post" class="form-horizontal" action="{{route('post.stock')}}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	{{csrf_field()}}
	<div class="row">
		<div class="col-md-12">
								<div class="col-md-12">
									<h3 style="color: blue">#Customer</h3>
								</div>
							</div>
		<div class="col-md-12">
		
								<div class="col-md-3">
								<input type="text" name="cname"  placeholder="enter customer name" >
									
								</div>
								<div class="col-md-3">
								<input type="text" name="cphone" placeholder="enter customer phone">
									
								</div>
								<div class="col-md-3" style="margin-top: 15px">
								<input type="date" name="date" placeholder="enter product date" class="form-control">
									
								</div>
								<div class="col-md-3">
								<input type="text" name="rnumber"  placeholder="enter receipt number">
									
								</div>

							
		</div>
		<div class="col-md-12">
								<input type="text" name="advance"  placeholder="enter Advance">
									
								</div>
	</div>

	<div class="col-md-12">
		<h3 style="color: blue">#Products</h3>
		<table class="table table-bordered" id="tbluser"> 
			<thead>
				<tr>
					
					<th>Item Name</th>
					<th>Size</th>
					<th>Quantity</th>
					<th>Color</th>
					<th>Price</th>
					<th>Total</th>
					<th><a href="#" class="addrow"><i class="glyphicon glyphicon-plus"></i></a></th>
				</tr>

			</thead>
			<tbody>
				<tr>
					
					<td>
<select class="form-control pname" name="pname[]" > 
									
									@foreach($pname as $p)
									<option value="{{$p->id}}" >
										{{$p->name}}
									</option>
									@endforeach
								</select>
						
					</td>
					<td>
<select class="form-control psize" name="psize[]" > 
									@foreach($size as $p)
									<option value="{{$p->id}}">
										{{$p->name}}
									</option>
									@endforeach
								</select></td>
<td>
<input type="text" name="pquantity[]" placeholder="product quantity" class="pquantity" ></td>

<td><select class="form-control" name="pcolor[]"> 
									@foreach($color as $p)
									<option value="{{$p->id}}">
										{{$p->name}}
									</option>
									@endforeach
								</select></td>
						<td>
<input type="text" name="price[]" class="price" placeholder="product price" >
									
								</td>
								<td>
<input type="text" class="total" name="total[]" placeholder="product total" >
									
								</td>
								<td><a href="#" class="btn btn-sm btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>
				</tr>

			</tbody>
			<tfoot>
				<tr>
					<td style="border: none"></td>
					<td style="border: none"></td>
					<td style="border: none"></td>
					<td style="border: none"></td>
					<td style="border: none"></td>
					<td >Grand Total Amount:<p class="grandtotal"></p></td>
				</tr>
			</tfoot>
		</table>
	</div>

</form>
<script type="text/javascript">
var token='{{Session::token()}}';
var add='{{route('get.price')}}';
</script>
<script type="text/javascript">
	
$('.addrow').on('click',function (){

addrow();


});


function addrow(){
var tr='<tr>'+
'<td>'+
'<select class="form-control pname" name="pname[]" >'+ 
'									@foreach($pname as $p)'+
'									<option value="{{$p->id}}" >'+
'										{{$p->name}}'+
'									</option>'+
'									@endforeach'+
'								</select>'+

'					</td>'+
'					<td>'+
'<select class="form-control psize" name="psize[]" > '+
'									@foreach($size as $p)'+
'									<option value="{{$p->id}}">'+
'										{{$p->name}}'+
'									</option>'+
'									@endforeach'+
'								</select></td>'+
'<td>'+
'<input type="text" name="pquantity[]" placeholder="product quantity" class="pquantity" ></td>'+

'<td><select class="form-control" name="pcolor[]"> '+
'									@foreach($color as $p)'+
'									<option value="{{$p->id}}">'+
'										{{$p->name}}'+
'									</option>'+
'									@endforeach'+
'								</select></td>'+
'						<td>'+
'<input type="text" name="price[]" class="price" placeholder="product price" >'+
									
'								</td>'+
'								<td>'+
'<input type="text" class="total" name="total[]" placeholder="product total" >'+
									
'								</td>'+
'								<td><a href="#" class="btn btn-sm btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>'+
				'</tr>';


$('tbody').append(tr);
};

$("#tbluser").on('click', '.remove', function () {
var l=$('tbody tr').length;
if(l==1){
	alert('you cannot delete it');
}
else{
    $(this).closest('tr').remove();
var total=0;
$('.total').each(function(i,e){
var grand=$(this).val()-0;
total+=grand;

});
$('.grandtotal').html(total);
}


});

$('tbody').delegate('.psize','change',function(){
var tr=$(this).parent().parent();
var pid=tr.find('.pname').val();
var sid=tr.find('.psize').val();

$.ajax({
method:'GET',
url:add,


data:{pid:pid,sid:sid,_token:token},
success:function(data){
tr.find('.price').val(data.price);


}


});


});


$('tbody').delegate('.pquantity,.price','keyup',function(){

var tr=$(this).parent().parent();
var qty=tr.find('.pquantity').val();
var price=tr.find('.price').val();
var total=qty*price;
tr.find('.total').val(total);


var total=0;
$('.total').each(function(i,e){
var grand=$(this).val()-0;
total+=grand;

});
$('.grandtotal').html(total);

});


</script>




@endsection