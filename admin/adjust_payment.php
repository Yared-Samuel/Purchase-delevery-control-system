<?php
include_once '../includes/connection.php';
include_once '../includes/functions.php';
include_once '../header.php';

reorder_pay();
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Delevery Form
      <small>FILL UNDER CAREFULLY</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Back</a></li>
      <li class="active">Sales Order View</li>
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
  <a href="so_remain.php"><button type="button" class="btn btn-outline-success"><i class="fa fa-backward" aria-hidden="true"></i>         Back</button></a>
        
          <!-- <div class="box-header with-border">
            <h3 class="box-title">Delevery form</h3>
          </div> -->
          <!-- /.box-header -->
          <!-- form start -->
          
              <div class="box-body">
              <form action="#" method="POST">
                <div class="col-sm-3">
                      <label >Old Price</label>
                      
                      <select class="form-control"  name="old_price" required>                   
                  <option value="">Select Previous Price</option>
                    <?php 
                            //dep_id_selector();
                            $query ="SELECT item_name,price_tbl.item_id,price FROM price_tbl 
                            JOIN item ON price_tbl.item_id=item.item_id 
                            WHERE price_start_date=(SELECT MAX(price_start_date) FROM price_tbl WHERE price_start_date < (SELECT MAX(price_start_date) FROM price_tbl))";
                            $result = $GLOBALS['mysqli']->query($query);
                            if($result->num_rows > 0){
                                while($optionData=$result->fetch_assoc()){
                                $price =$optionData['price'];
                                $item =$optionData['item_name'];
                                
                    ?>
                    <?php
                            //selected option
                            if(!empty($option) && $option == $option){
                            // selected option
                      ?>
                  <option value="<?php echo $price; ?>" ><?php echo $item.' | '.$price; ?></option>

                  <?php 
                      continue;
                  }?>
                  <option value="<?php echo $price; ?>"><?php echo $item.' | '.$price; ?></option>
                  <?php
                      }}
                  ?>
                </select>
                  </div>


                  <div class="col-sm-3">
                      <label for="">New Price</label>
                      
                      <select class="form-control"  name="new_price" required>                   
                  <option value="">Select New Price</option>
                    <?php 
                            //dep_id_selector();
                            $query ="SELECT item_name,price_tbl.item_id,price FROM price_tbl JOIN item ON price_tbl.item_id=item.item_id WHERE price_start_date=(SELECT MAX(price_start_date) FROM price_tbl)";
                            $result = $GLOBALS['mysqli']->query($query);
                            if($result->num_rows > 0){
                                while($optionData=$result->fetch_assoc()){
                                $price =$optionData['price'];
                                $item =$optionData['item_name'];
                                
                    ?>
                    <?php
                            //selected option
                            if(!empty($option) && $option == $option){
                            // selected option
                      ?>
                  <option value="<?php echo $price; ?>" ><?php echo $item.' | '.$price; ?></option>

                  <?php 
                      continue;
                  }?>
                  <option value="<?php echo $price; ?>"><?php echo $item.' | '.$price; ?></option>
                  <?php
                      }}
                  ?>
                </select>
                  </div>

                  <div class="col-sm-3">
                      <label >New Sales Order</label>
                      <input type="text" class="form-control " placeholder="So for new price" name="new_so" required>
                  </div>
                            </br>
                  <div class="col-sm-2">
                  <button type="submit" class="btn btn-info" name="Re_Order">Submit</button>
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