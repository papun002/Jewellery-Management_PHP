<html>
 <head>
  <title>Display Last N Days Data into Datatables using PHP Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
 </head>
 <body>
  <div class="container">
   <h2 align="center">Display Last N Days Data into Datatables using PHP Ajax</h2>
   <br />

   <div class="row">
    <div class="col-md-2">
     <select name="days_filter" id="days_filter" class="form-control">
      <option value="">Select Days</option>
      <option value="180">Year</option>
      <option value="90">3 Month</option>
      <option value="60">2 Month</option>
      <option value="30">Month</option>
     </select>
    </div>
    <div style="clear:both"></div>
    <br />
    <div class="table-responsive">
     <table id="order_data" class="table table-bordered table-striped">
      <thead>
       <tr>
                        <th>Date</th>
                        <th>Bill No.</th>
                        <th>Customer Name</th>
                        <th>Product Name</th>
                        <th>Product Weight</th>
                        <th>HUID No.</th>
                        <th>GST</th>
                        <th>Price</th>
       </tr>
      </thead>
     </table>
    </div>
   </div>


  </div>
 </body>
</html>



<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 
 load_data();

 function load_data(is_days)
 {
  var dataTable = $('#order_data').DataTable({
   "processing":true,
   "serverSide":true,
   "order":[],
   "ajax":{
    url:"fetch_history.php",
    type:"POST",
    data:{is_days:is_days}
   }
  });
 }

 $(document).on('change', '#days_filter', function(){
  var no_of_days = $(this).val();
  $('#order_data').DataTable().destroy();
  if(no_of_days != '')
  {
   load_data(no_of_days);
  }
  else
  {
   load_data();
  }
 });
 
});
</script>