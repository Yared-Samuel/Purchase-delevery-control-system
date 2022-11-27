<?php
include_once '../includes/connection.php';
include_once '../includes/functions.php';
include_once '../header.php';



?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Salse Order Follow up
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="task.php"><i class="fa fa-dashboard"></i> Back</a></li>
      <li class="active">Here</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <!--------------------------
      | Your Page Content Here |
      -------------------------->

      



<div class="box box-info" style="overflow-x: auto; white-space: nowrap;">
<a href="reorder.php">
<button type="button" class="btn btn-warning active" aria-pressed="true">Adjusted Sales Orders</button>
</a>
<div class="box-header"  style="background-color:ivory; font-size: 120%; color: black;"> Partialy Delevered Sales Orders</div>

  <div class="box box-info"></div>
        <table id="so_rem" class="table table-sm hover cell-border compact stripe display"  >
  <thead style="background-color: gray; font-size: 100%; color: white;">
              <tr>
                <th>#</th>
                <th class="col-md-2">Product Name</th>
                <th class="col-md-2">Date Of Payment</th>
                <th class="col-md-2">Paid Qty</th>
                <th class="col-md-2">Delevered Qty</th>
                <th class="col-md-1">Remaining</th>
                <th class="col-md-2">Sales Order</th>
                <th class="col-md-1">Detail </th>  
                <th class="col-md-1">Adjustment</th>          
                
                
              </tr>
              </thead>
              <tbody>
              <?php
              // LOOP TILL END OF DATA

              
              
              $result = so_remain();
              $count=1;

              while ($rows = mysqli_fetch_assoc($result)) {


                ?>
              <tr>
                <td style="font-size: 120%;" ><?php echo $count; ?></td>
                <td style="font-size: 120%;"><?php echo $rows['item_name']; ?></td>
                <td><?php echo $rows['pay_date']; ?></td>
                <td><?php echo $rows['pay_qty']; ?></td>
                <td><?php echo $rows['delev']; ?></td>
                <td style="color:blue; font-size: 120%;"><?php echo $rows['remaining']; ?></td>
                <td style=" font-size: 120%;"><?php echo $rows['pay_so']; ?></td>
                <td><a href="view_so_detail.php?pay_so=<?php echo $rows["pay_so"]; ?>"><button type="button" class="btn btn-block btn-darker" name="detail"><i class="fa fa-binoculars "></i></button></a></td>
                <td ><a href="adjust_payment.php?pay_so=<?php echo $rows["pay_so"]; ?>"><button class="btn btn-block btn-darker" type="button"  name="detail"><i class="fa fa-retweet "></i></button></a></td>
                
                
                             
              </tr>
              <?php
              $count++;
              } 
              ?>
                              
              </tfoot>
            </tbody>
            </table> 
            <div class="box box-info"></div>

      </div>


      <div class="box box-info">
      <div class="box-header"  style="background-color:ivory; font-size: 120%; color: black;"> New Sales Orders</div>
      <div class="box box-info"></div>
      <table id="so_rem" class="table table-sm hover cell-border compact stripe display"  >
        <thead style="background-color: gray; font-size: 100%; color: white;">
              <tr>
                <th class="col-md-2">#</th>
                <th class="col-md-2">Product Name</th>
                <th class="col-md-2">Date Of Payment</th>
                <th class="col-md-2">Paid Qty</th>                
                <th class="col-md-2">Sales Order</th>
                <th class="col-md-1">Detail</th>
                <th class="col-md-1">Adjustment</th>             
                
                
              </tr>
              </thead>
              <tbody>
              <?php
              // LOOP TILL END OF DATA

              
              
              $result = so_new_paid();
              $count=1;

              while ($rows = mysqli_fetch_assoc($result)) {


                ?>
              <tr>
                <td style="font-size: 120%;" ><?php echo $count; ?></td>
                <td style="font-size: 120%;"><?php echo $rows['item_name']; ?></td>
                <td><?php echo $rows['pay_date']; ?></td>
                <td><?php echo $rows['pay_qty']; ?></td>
                <td><?php echo $rows['pay_so']; ?></td>
                <td><a href="view_so_detail.php?pay_so=<?php echo $rows["pay_so"]; ?>"><button type="button" class="btn btn-block btn-darker" name="detail"><i class="fa fa-binoculars "></i></button></a></td>
                <td ><a href="adjust_payment.php?pay_so=<?php echo $rows["pay_so"]; ?>"><button class="btn btn-block btn-darker" type="button"  name="detail"><i class="fa fa-retweet "></i></button></a></td>
                
                
                             
              </tr>
              <?php
              $count++;
              } 
              ?>
                              
              </tfoot>
            </tbody>
            </table> 
            <div class="box box-info"></div>

      </div>
      
  </section>
  <!-- /.content -->
</div>

<script>
$(document).ready( function () {
    $('#so_rem').DataTable( {
        dom: 'lBfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    }
      
      
  
    );
    
} );
</script>
  <?php

include_once '../footer.php';


?>