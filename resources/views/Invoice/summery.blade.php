


<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title> Invoice</title>
  <link rel="stylesheet" href="{{asset('dashboard/css/bootstrap2.css')}}">
  <style>
  @import url(http://fonts.googleapis.com/css?family=Bree+Serif);
  body, h1, h2, h3, h4, h5, h6{
    font-family: 'Bree Serif', serif;
  }
  </style>
</head>
<body>
  <div class="row">
      
      <div class="col-md-12">
       <div class="span7">
        <div class="panel panel-info">
          <div class="panel-heading">
           <button class="btn btn-primary pull-right " onclick="printContent('divide')">print</button>

           
            <a href="/home"><button class="btn btn-danger ">Home</button></a>
          </div>
         
        </div>
      </div>
      </div>
    </div>
<div id="divide">
  

  <div class="container" >

  
    

   <!-- / end client details section -->

             <table class="table table-bordered" id="idoftable">
        <thead>
          <tr>
            
            <th><h4>Name</h4></th>
            <th><h4>Phone</h4></th>
            <th><h4>Previous</h4></th>
            <th><h4>Current</h4></th>
           
            <th><h4>Total</h4></th>
          

          
          </tr>
        </thead>
        <tbody>
             @if($users!=null)
         @foreach($users as $in)
       
           
         
          <tr>
       @foreach($customer as $cus)
      @if($cus->id==$in->customer_id)
           <td class="service">{{$cus->cname}}</td>
           <td class="service">{{$cus->cphone}}</td>
           @endif
           @endforeach
            <td class="desc">{{$in->previous}}</td>
           

           <td class="desc">{{$in->currents}}</td>
      
         <td class="desc">{{$in->currents+$in->previous}}</td>
      
         

           

         
         
           
            
          </tr>

        @endforeach
          
            @endif
       
        </tbody>
      </table>

   
</div>
</div>


</body>

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
<iframe id="txtArea1" style="display:none"></iframe>
<button id="btnExport" onclick="fnExcelReport();"> EXPORT </button>
<button onclick="exportTableToExcel('idoftable')">Export Table Data To Excel File</button>

<script type="text/javascript">
  
function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}



  function fnExcelReport()
{
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById('idoftable'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}
</script>
</html>
