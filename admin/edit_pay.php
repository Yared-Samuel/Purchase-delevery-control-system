<?php
include_once '../includes/connection.php';
include_once '../includes/functions.php';
include_once '../header.php';


$pay_id=$_GET['pay_id'];
edit_payment($pay_id);


?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <b>Edit Payment</b>
      
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Back</a></li>
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
              <form action="" method="POST">
            <?php 

              $select = "SELECT pay_id,item_name,pay_qty,pay_date,pay_so,ck_num,pay_site
              FROM pay_tbl
              JOIN item ON pay_tbl.item_id = item.item_id 
              WHERE pay_id='$pay_id'";

              $result = $GLOBALS['mysqli']->query($select);
              $rows=$result->fetch_assoc();
            
            
            ?>
               
              <div class="col-sm-2">
              <label>Date</label>

              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="date" class="form-control pull-right" id="datepicker" value="<?php echo $rows['pay_date'];?>" name="pay_date" date_format required>
              </div>
              <!-- /.input group -->
            </div>

            <div class="col-sm-2">
                  <label>Item / Product</label>
                <select class="form-control"  name="item_id" required>                   
                <option value="" >Please Select item</option>
                    <?php 
                          
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
                      <label for="">Sales Order</label>
                      <input type="text" class="form-control " value="<?php echo $rows['pay_so']; ?>" name="pay_so" required>
                  </div> 
              
                  


                  <div class="col-sm-2">
                      <label for="">Quantity</label>
                      <input type="text" class="form-control " value="<?php echo $rows['pay_qty']; ?>" name="pay_qty" required>
                  </div>


                  <div class="col-sm-2">
                      <label for="">Ck numaber</label>
                      <input type="text" class="form-control " placeholder="Ck numaber" value="<?php echo $rows['ck_num']; ?>" name="ck_num" required>
                  </div>


                  


                  <div class="col-sm-2">
                      <label >Site</label>
                      <input type="text" class="form-control " placeholder="Site" value="<?php echo $rows['pay_site']; ?>" name="pay_site">
                  </div>
                            </br>
                  <div class="col-sm-2">
                  <button type="submit" class="btn btn-info" name="edit_pay">Submit</button>
                  </div>             

              </div> 
              

              
                  
                  
                 
                  </form>
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