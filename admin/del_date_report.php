<?php
include_once '../includes/session.php';
include_once '../includes/connection.php';
include_once '../includes/functions.php';
include_once '../header.php';

filter_item_bydate();
filter_total_item_bydate();
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
                                        <input type="date" name="from_date" value="<?php if(isset($_POST['from_date'])){ echo $_POST['from_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>To Date</label>
                                        <input type="date" name="to_date" value="<?php if(isset($_POST['to_date'])){ echo $_POST['to_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                              <label>Item / Product</label>
                                    <select class="form-control"  name="item_id" >                    
                                      <option >Select Item</option>
                                        <?php 
                                                //dep_id_selector();
                                                $query ="SELECT item_name,item_id FROM item";
                                                $result = $GLOBALS['mysqli']->query($query);
                                                if($result->num_rows > 0){
                                                    while($optionData=$result->fetch_assoc()){
                                                    $option =$optionData['item_name'];
                                                    $item_id  =$optionData['item_id'];
                                        ?>
                                        <?php
                                                //selected option
                                                if(!empty($option) && $option == $option){
                                                // selected option
                                          ?>
                                      <option value="<?php echo $item_id; ?>" ><?php echo $option; ?></option>

                                      <?php 
                                          continue;
                                      }?>
                                      <option value="<?php echo $item_id; ?>"><?php echo $option; ?></option>
                                      <?php
                                          }}
                                      ?>
                                    </select>
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
                <th>Quantity</th>
                <th>Date</th>
                <th>Sales O.</th>
                <th>GRN No.</th>       
                </tr>
              </thead>
              <tbody>
              <?php
              // LOOP TILL END OF DATA

              
              $count=1;
              $result = filter_item_bydate();

              if($result != NULL)
              {
                foreach($result as $row)
                                        {


                ?>
                
                 <tr>
                 <td class="col-md-1" style="font-size: 115%;" ><?php echo $count; ?></td>
                 <td class="col-md-2"><?php echo $row['item_name']; ?></td>
                <td class="col-md-1"><?php echo $row['del_qty']; ?></td>
                <td class="col-md-2"><?php echo $row['del_date']; ?></td>
                <td class="col-md-1"><?php echo $row['del_so']; ?></td>
                <td class="col-md-1"><?php echo $row['del_ref']; ?></td>
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

      <div class="col-xs-4">
      
<h4>Total Delevered</h4>
  <div class="table-responsive">
            <table class="table table-striped" id="del">
            <thead style="background-color: gray; font-size: 100%; color: white;">
                <tr>
                  <th class="col-md-1">Product Name</th>
                  <th class="col-md-2">Delevered Quantity(TOTAL)</th>
                  
                </tr>
              </thead>
              <tbody>
              <?php
              // LOOP TILL END OF DATA      
              $result = filter_total_item_bydate();

              if($result != NULL)
              {
                foreach($result as $row)
                                        {
                ?>
                
                 <tr>
                  <td class="col-md-2"><?php echo $row['item_name']; ?></td>
                  <td class="col-md-2"><?php echo $row['totaldel']; ?></td>
                </tr>
                <?php
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
$(document).ready( function () {
    $('#del').DataTable( {
        dom: 'Bfrtip',
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