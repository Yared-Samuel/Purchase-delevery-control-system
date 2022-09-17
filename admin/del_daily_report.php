<?php
include_once '../includes/connection.php';
include_once '../includes/functions.php';
include_once '../header.php';

//filter_daily();
// filter_total_item_bydate();
?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <b>Delevery Reports</b>
      <small>DATE RANGES ARE RQUAERED</small>
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
<div class="box box-info">
<form action="" method="POST">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>From Date</label>
                                        <input type="date" name="date" value="<?php if(isset($_POST['from_date'])){ echo $_POST['from_date']; } ?>" class="form-control">
                                    </div>
                                </div>                                
                                        </br>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        
                                      <button type="submit" class="btn btn-primary" name="submit">Filter</button>
                                    </div>
                                </div>
                                
                            </div>
                        </form>
  
        
            <div class="box box-dark"></div>
              

      
  <div class="col-xs-8">
          <h4>Delevery In Detail</h4>
          <div class="table-responsive">
            <table class="table table-striped" id="del">
            <thead style="background-color: gray; font-size: 100%; color: white;">
                <tr>
                <th>#</th>
                <th>Product Name</th>         
                <th>Date</th>
                <th>Quantity</th>
                    
                </tr>
              </thead>
              <tbody>
              <?php
              // LOOP TILL END OF DATA

              
              $count=1;
              $result = filter_daily();

              if($result != NULL)
              {
                foreach($result as $row)
                                        {
                ?>               
                 <tr>
                <td class="col-md-1" style="font-size: 115%;" ><?php echo $count; ?></td>
                <td class="col-md-2"><?php echo $row['item_name']; ?></td>
                <td class="col-md-2"><?php echo $row['del_date']; ?></td>
                <td class="col-md-1"><?php echo $row['totaldel']; ?></td>
                                
                </tr>
                <?php
              $count++;
              } 
            }
              ?>
                
              </tbody>
            </table>

      </div>
      </div>

      


      </div>
      
   
  </section>
  <!-- /.content -->
</div>

<script>
$(document).ready(function() {
  $('#producttable').DataTable({
    "order": [
      [2, "desc"]
    ],
    dom: 'Bfrtip',
    buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
  });
});
</script>

  <?php

include_once '../footer.php';


?>