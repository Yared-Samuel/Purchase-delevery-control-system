<?php
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

      
<div class="col-md-6 box box-info">
<div class="box-header"  style="background-color:ivory; font-size: 120%; color: black;"> Filte delevery by date</div>
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
                                    <select class="form-control"  name="item_id">                    
                                      <option value="<?php if(isset($_POST['item_name'])){ echo $_POST['item_name']; } ?>">Select Item</option>
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
                              
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Click to Filter</label> <br>
                                      <button type="submit" class="btn btn-primary" name="select">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>
  
        <table class="table table-sm hover cell-border compact stripe" id="producttable" >
  <thead style="background-color: gray; font-size: 100%; color: white;">
              <tr>
                <th>#</th>
                <th>Product Name</th>               
                <th>Delevered Quantity</th>
                <th>Deleverey Date</th>
                <th>Salse Order</th>
                <th>GRN Reference</th>            
                
                
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
              <td style="font-size: 115%;" ><?php echo $count; ?></td>
                <td><?php echo $row['item_name']; ?></td>
                <td><?php echo $row['del_qty']; ?></td>
                <td><?php echo $row['del_date']; ?></td>
                <td><?php echo $row['del_so']; ?></td>
                <td><?php echo $row['del_ref']; ?></td>
                
                
                
                             
              </tr>
              <?php
              $count++;
              } 
            }else {
              ?>
                <tr>
                
                
                <td><h4>No delevery found</h4></td>           
                             
              </tr>
              <?php
            }
              ?>
                              
              </tfoot>
            </tbody>
            </table> 
            <div class="box box-info"></div>
      <div class="col-md-6 box box-warning ">
<div class="box-header"  style="background-color:ivory; font-size: 120%; color: black;"> Filter <b>TOTAL</b> Delevery </div>
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
                                    <select class="form-control"  name="item_id" value="<?php if(isset($_POST['item_name'])){ echo $_POST['item_name']; } ?>">                    
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Click to Filter</label> <br>
                                      <button type="submit" class="btn btn-primary" name="submit">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>
  
        <table class="table table-sm hover cell-border compact stripe" id="producttable" >
  <thead style="background-color: gray; font-size: 100%; color: white;">
              <tr>
                <th>Product Name</th>               
                <th>Delevered Quantity(TOTAL)</th>
                          
                
                
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
                <td><?php echo $row['item_name']; ?></td>
                <td><?php echo $row['totaldel']; ?></td>                            
              </tr>
              <?php
              } 
            }else {
              ?>
                <tr>                
                <td><h4>No delevery found</h4></td>           
                             
              </tr>
              <?php
            }
              ?>                              
              </tfoot>
            </tbody>
            </table> 
            <div class="box box-warning"></div>
              </div>

      <div class="col-xs-6">
      
<h2 class="sub-header">Subtitle</h2>
  <div class="table-responsive">
            <table class="table table-striped">
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
                  <td class="col-md-1"><?php echo $row['item_name']; ?></td>
                  <td class="col-md-2"><?php echo $row['totaldel']; ?></td>
                </tr>
                <?php
              } 
            }else {
              ?>
              <tr>                
                <td><h4>No delevery found</h4></td>           
                             
              </tr>
              <?php
            }
              ?>                    
              </tbody>
            </table>

          </div>
</div>
  <div class="col-xs-6">
          <h2 class="sub-header">Latest Incidents</h2>
          <div class="table-responsive">
            <table class="table table-striped">
            <thead style="background-color: gray; font-size: 100%; color: white;">
                <tr>
                <th>#</th>
                <th>Product Name</th>               
                <th>Delevered Quantity</th>
                <th>Deleverey Date</th>
                <th>Salse Order</th>
                <th>GRN Reference</th>       
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
                 <td style="font-size: 115%;" ><?php echo $count; ?></td>
                 <td class="col-md-3"><?php echo $row['item_name']; ?></td>
                <td class="col-md-3"><?php echo $row['del_qty']; ?></td>
                <td class="col-md-2"><?php echo $row['del_date']; ?></td>
                <td class="col-md-1"><?php echo $row['del_so']; ?></td>
                <td class="col-md-1"><?php echo $row['del_ref']; ?></td>
                </tr>
                <?php
              $count++;
              } 
            }else {
              ?>
                <tr>
                
                
                <td><h4>No delevery found</h4></td>           
                             
              </tr>
              <?php
            }
              ?>
              </tbody>
            </table>

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