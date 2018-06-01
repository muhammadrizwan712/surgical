@extends('Dashboard/dashboard')

@section('content')
<style> 
input[type=text] {
   
    padding: 12px 20px;
    margin: 4px 0;
    box-sizing: border-box;
    border: none;
    border-bottom: 2px solid lightblue;
    
}
</style>
<div id="myModal" style="margin-top:30px"  class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form role="form" id="myform" action="">
        
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="text-align: center">Edit Price</h4>
      </div>
      <div class="modal-body" width="30px" >
       <textarea id="body" name="body" class="form-control" placeholder="your report must be solid"></textarea>
          <textarea id="idclass" name="idclass" style="display: none" class="form-control" placeholder="your report must be solid"></textarea>
     
       <input type="hidden" name="_token" value="{{Session::token()}}">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
     <button id="save" type="button" class="btn btn-primary" >Save</button> 
      </div>
      </form>

    </div>

  </div>
</div>
<form method="post" action="{{route('post.product.price')}}" >
  {{csrf_field()}}

<div class="col-md-12">
  
  <div class="col-md-3" style="margin-top: 30px">
   <select class="form-control" name="productid">
      @foreach($product as $cls)
      <option value="{{$cls->id}}">
        {{$cls->name}}
      </option>
      @endforeach
    </select>
  </div>
    <div class="col-md-3" style="margin-top:30px">
    <select class="form-control" name="sizeid">
      @foreach($size as $cls)
      <option value="{{$cls->id}}">
        {{$cls->name}}
      </option>
      @endforeach
    </select>
  </div>
   <div class="col-md-3" style="margin-top:30px">
    <input type="text" name="price" placeholder="price ">
  </div>
  <div class="col-md-2" style="margin-top: 30px">
    <button class="btn btn-primary">Save</button>
  </div>
</div>
</form>

<div class="row">
  <div class="col-md-12">
    

      <div style="background-color: white">
    <br><br>
  
  <h2 style="text-align: center;color:  blue">PRICE SETTING</h2>


<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
              <th>Id</th>
                <th>Price</th>
                <th>Size</th>
                <th>Item</th>
                        @if(Auth::User()->hasrole('admin'))

                <th>Action</th>
                @endif
               
               
                
            </tr>
        </thead>
       
        <tbody>
          @foreach($productsize as $cls)
            <tr>

                <td>{{$cls->id}}</td>
                <td>{{$cls->price}}</td>
                <td>{{$cls->size->name}}</td>
                <td>{{$cls->product->name}}</td>
                        @if(Auth::User()->hasrole('admin'))
               
                <td><a href="#"  class="btn btn-xs btn-primary edit"><i class="glyphicon glyphicon-edit "></i> Edit</a>
                <a href="{{route('delete.product.price',$cls->id)}}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</a>
                
               </td>
               @endif
              
             

             
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
var add='{{route('edit.product.price')}}';

</script> 
</div>
  </div>

</div>


@endsection