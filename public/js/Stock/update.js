
$('input:checkbox').change(function(){

var orderid=this.value;




$.ajax({
method:'POST',
url:add,

data:{orderid:orderid,_token:token},
success:function(data){
alert('operaction successed');

}


});

});