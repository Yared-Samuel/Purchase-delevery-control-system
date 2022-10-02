<?php
include_once '../includes/connection.php';
include_once '../includes/functions.php';
include_once '../header.php';

add_price();
?>






  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Price
      <small>Caution this form is vital for re_order and some other Reports</small>
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

      <div class="box box-warning">
      
  
          
              <div class="col-xs-6">
              <form action="#" method="POST">
            
              <div class="col-md-12">
              <label>Date</label>
                <input type="date" class="form-control" id="datepicker" name="date" date_format required>
              <!-- /.input group -->
            </div>
                  
                  <div class="col-md-6">
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
                  
                  <div class="col-md-6">
                      <label >Price <small>new</small></label>
                      <input type="text" class="form-control " placeholder="required field" name="new_price" required>
                  </div>

                            
                  <div class="col-md-12">
                  <button type="submit" class="btn btn-info form-control" name="add_price" required>Submit</button>
                  </div>             

              </div> 
              

              <div class="col-xs-6">
          
          <div class="table-responsive">
            <table class="table table-striped" id="del">
            <thead style="background-color: gray; font-size: 100%; color: white;">
                <tr>
                <th>#</th>
                <th>Product Name</th>               
                <th>Date starting</th>
                <th>ending date</th>
                <th>Price</th>       
                </tr>
              </thead>
              <tbody>
              <?php
              // LOOP TILL END OF DATA

              
              $count=1;
              $result = filter_price();

              if($result != NULL)
              {
                foreach($result as $row)
                                        {


                ?>
                
                 <tr>
                 <td class="col-md-1" style="font-size: 115%;" ><?php echo $count; ?></td>
                 <td class="col-md-2"><?php echo $row['item_name']; ?></td>
                <td class="col-md-1"><?php echo $row['price_start_date']; ?></td>
                <td class="col-md-1"><?php echo $row['price_end_date']; ?></td>
                <td class="col-md-2"><?php echo $row['price']; ?></td>
                
                </tr>
                <?php
              $count++;
              } 
            }
              ?>
                
              </tbody>
            </table>

      </div>
      <div class="box box-warning"></div>
      </div>
    </form>     
</div>
<div>
      
  </section>
  <!-- /.content -->
</div>

<script>
$(document).ready( function () {
    $('#del').DataTable( {
        
    }
      
      
  
    );
    
} );
</script>


  <?php

include_once '../footer.php';


?>