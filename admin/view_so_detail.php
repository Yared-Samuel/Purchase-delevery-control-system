<?php
include_once '../includes/session.php';
include_once '../includes/connection.php';
include_once '../includes/functions.php';
include_once '../header.php';

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Sales Order In Detail
      <small></small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="so_remain.php"><i class="fa fa-dashboard"></i> Back</a></li>
      <li class="active">Sales Order View</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <!--------------------------
      | Your Page Content Here |
      -------------------------->

<div class="box box-info">
<div class="box-header"  style="background-color:ivory; font-size: 130%; color: green; font-weight: bold;"> 
<?php $result = view_del_by_so(); $rows = mysqli_fetch_assoc($result); 
         echo "  Payment date   "."_____________" .$rows['pay_date'];
         ?>
         <br>
         <?php
         echo "  Quantity Paid  "."_____________".$rows['pay_qty'];       
        ?>
         <br>
         <?php
         echo "  Salse Order    "."_______________" .$rows['pay_so'];       
        ?>
</div>
  <div class="box box-info"></div>
        <table id="detail" class="table table-sm hover cell-border compact stripe display"  >
  <thead style="background-color: gray; font-size: 115%; color: white;">
              <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Delevered Qty</th>                
                <th>Date</th>
                <th>Reference Number</th>
              </tr>
              </thead>
              <tbody>
              <?php
              // LOOP TILL END OF DATA
              $count=1;
              $result = view_del_by_so();
              while ($rows = mysqli_fetch_assoc($result)) {
                ?>
              <tr>
                <td style="font-size: 115%; color: purple;" ><?php echo $count; ?></td>
                <td style="font-size: 115%; color: purple;" ><?php echo $rows['item_name']; ?></td>
                <td style="font-size: 115%; color: purple;"><?php echo $rows['del_qty']; ?></td>                
                <td style="font-size: 115%; color: purple;"><?php echo $rows['del_date']; ?></td>
                <td style="font-size: 115%; color: purple;"><?php echo $rows['del_ref']; ?></td>
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
      <div class="box-header"  style="background-color:ivory; font-size: 120%; color: black;"> 
      <a href="so_remain.php"> <button type="button" class="btn btn-block btn-gray btn-lg">Back</button></a>
    </div>
      
  </section>
  <!-- /.content -->
</div>

<script>
$(document).ready( function () {
    $('#detail').DataTable( {
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