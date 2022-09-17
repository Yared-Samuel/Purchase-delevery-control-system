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
      <li><a href="so_remain.php"><i class="fa fa-dashboard"></i>Back</a></li>
      <li class="active">Here</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <!--------------------------
      | Your Page Content Here |
      -------------------------->

      



<div class="box box-info">
<div class="text-right">
<a href="so_remain.php"><button type="button" class="btn btn-outline-success"><i class="fa fa-backward" aria-hidden="true"></i>         Back</button></a>
</div>
<div class="box-header"  style="background-color:ivory; font-size: 120%; color: black;"> Adjusted Payments</div>
  <div class="box box-info"></div>
        <table id="deleverytbl" class="table table-sm hover cell-border compact stripe display">
  <thead style="background-color: gray; font-size: 100%; color: white;">
              <tr>
                <th>#</th>
                <th class="col-md-2">Product</th>
                <th class="col-md-2">Reorder date</th>
                <th class="col-md-2">Original qty</th>
                <th class="col-md-2">Adjusted qty</th>
                <th class="col-md-2">Original So.</th>
                <th class="col-md-1">Adjusted So.</th>
                
                         
                
                
              </tr>
              </thead>
              <tbody>
              <?php
              // LOOP TILL END OF DATA

              
              
              $result = veiw_reorder();
              $count=1;

              while ($rows = mysqli_fetch_assoc($result)) {


                ?>
              <tr>
                <td style="font-size: 120%;" ><?php echo $count; ?></td>
                <td style="font-size: 120%;"><?php echo $rows['item_name']; ?></td>
                <td style="font-size: 120%;"><?php echo $rows['date_reo']; ?></td> 
                <td style="color:green; font-size: 120%;"><?php echo $rows['old_qty']; ?></td>             
                <td style="color:green; font-size: 120%;"><?php echo $rows['new_qty']; ?></td>                
                <td style="color:blue; font-size: 120%;"><?php echo $rows['old_so']; ?></td>
                <td style="color:blue; font-size: 120%;"><?php echo $rows['new_so']; ?></td>
                
                
                
                             
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
    $('#deleverytbl').DataTable();
} );
</script>

  <?php

include_once '../footer.php';


?>