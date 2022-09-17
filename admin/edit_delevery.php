<?php
include_once '../includes/connection.php';
include_once '../includes/functions.php';
include_once '../header.php';
add_delevery();
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Delevery Form
      <small>FILL UNDER FOR DELEVERED PRODUCTS</small>
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

      <div class="box box-warning">
      <div class="card">
  <!-- <div class="card-header text-blue">
  <h3>Delevery Form</h3>
  </div> -->
  <div class="card-body">
        
          <!-- <div class="box-header with-border">
            <h3 class="box-title">Delevery form</h3>
          </div> -->
          <!-- /.box-header -->
          <!-- form start -->
          
              <div class="box-body">
              <form action="#" method="POST">


              <div class="col-sm-2">
              <label>Date</label>

              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="date" class="form-control pull-right" id="datepicker" name="pay_date" date_format required>
              </div>
              <!-- /.input group -->
            </div>

            <div class="col-sm-2">
                  <label>Item / Product</label>
                <select class="form-control"  name="item_id" required>                    
                  <option value="">Select Item</option>
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

                  <div class="col-sm-2">
                         <label>Select Sales Order</label>
                       <select class="form-control"  name="del_so">                    
                         <option value="" disabled selected>Sales Order</option>
                           <?php 
                                   //dep_id_selector();
                                  //  $query ="SELECT pay_date,pay_so,item_name,item.item_id
                                  //             -- ,pay_qty - Sum(del_qty) AS remaining
                                  //              FROM pay_tbl 
                                  //           JOIN item ON pay_tbl.item_id = item.item_id 
                                  //           -- JOIN delevered ON delevered.del_so = pay_tbl.pay_so
                                  //            GROUP BY pay_so ORDER BY pay_date DESC
                                  //           -- HAVING remaining > 0  
                                  //            ";

                                  $query = "SELECT item_name,pay_so, pay_date,pay_qty, Sum(del_qty) AS delev, pay_qty - Sum(del_qty) AS remaining  
                                  FROM `pay_tbl` JOIN delevered ON pay_tbl.pay_so = delevered.del_so 
                                  JOIN item ON pay_tbl.item_id = item.item_id GROUP BY pay_so
                                  HAVING pay_qty - SUM(del_qty) != 0 ORDER BY remaining DESC";


                                   $result = $GLOBALS['mysqli']->query($query);
                                   if($result->num_rows > 0){
                                       while($optionData=$result->fetch_assoc()){
                                       $option =$optionData['pay_so'];
                                       $item_name =$optionData['item_name'];
                                       $remaining =$optionData['remaining'];
         
                                       
                           ?>
                           <?php
                                   //selected option
                                   if(!empty($option) && $option == $option){
                                   // selected option
                             ?>
                         <option value="<?php echo $option; ?>"><?php echo $item_name ." ". $option." ".$remaining; ?></option>
         
                         <?php 
                             continue;
                         }?> 
                         <option value="<?php echo $option ; ?>"><?php echo $item_name ." ". $option." ".$remaining; ?></option>
                         <?php
                             }}
                         ?>
                       </select>
                         </div> 
              
                  <!-- <div class="col-xs-6">
                      <label for="">Sales Order</label>
                      <input type="text" class="form-control mb-5" placeholder="Fill Sales Order" name="del_so" required>
                  </div> -->


                  <div class="col-sm-2">
                      <label for="">Quantity</label>
                      <input type="text" class="form-control " placeholder="Quantity Delevered" name="del_qty" required>
                  </div>


                  


                  <div class="col-sm-2">
                      <label >Reference</label>
                      <input type="text" class="form-control " placeholder="GRN reference" name="del_ref" required>
                  </div>
                            </br>
                  <div class="col-sm-2">
                  <button type="submit" class="btn btn-info" name="addemp">Submit</button>
                  </div>             

              </div> 
              

              
                  
                  
                 
                  </form>
      </div>

      </div>
</div>




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