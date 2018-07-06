<style>
.alert {
    padding: 20px;
    background-color: #f44336;
    color: white;
    opacity: 1;
    transition: opacity 0.6s;
    margin-bottom: 15px;
}

.alert.success {background-color: #4CAF50;}
.alert.info {background-color: #2196F3;}
.alert.warning {background-color: #ff9800;}

.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.closebtn:hover {
    color: black;
}
</style>
@if(Session::has('flash_message'))

   <div class="alert {{ (Session::has('flash_message_status'))?'alert-error':'alert danger'}}">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  {!! Session::get('flash_message') !!}
</div>
   

@endif
@if(Session::has('flash_success'))

   <div class="alert {{ (Session::has('flash_success_status'))?'alert-error':'alert success'}}">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  {!! Session::get('flash_success') !!}
</div>
   

@endif