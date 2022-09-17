<?php
include_once '../includes/session.php';
include_once '../header.php';
include_once '../includes/connection.php';
include_once '../includes/functions.php';


add_payment();
?>



  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <b>Payment Form</b>
      <small>FILL UNDER TO MAKE PAYMENT TO BGI</small>
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
                      <label for="">Sales Order</label>
                      <input type="text" class="form-control " placeholder="Select salse Order" name="pay_so" required>
                  </div> 
              
                  


                  <div class="col-sm-2">
                      <label for="">Quantity</label>
                      <input type="text" class="form-control " placeholder="Quantity Paid for" name="pay_qty" required>
                  </div>


                  <div class="col-sm-2">
                      <label for="">Ck numaber</label>
                      <input type="text" class="form-control " placeholder="Ck numaber" name="ck_num" required>
                  </div>


                  


                  <div class="col-sm-2">
                      <label >Site</label>
                      <input type="text" class="form-control " placeholder="Site" name="pay_site">
                  </div>
                            </br>
                  <div class="col-sm-2">
                  <button type="submit" class="btn btn-info" name="pay">Submit</button>
                  </div>             

              </div> 
              

              
                  
                  
                 
                  </form>
      </div>

      </div>
</div>



<div class="box box-info">
<div class="box-header"  style="background-color:ivory; font-size: 120%; color: black;"> Delevered Products</div>
  <div class="box box-info"></div>
        <table id="paytbl" class="display table table-sm hover cell-border compact stripe
        "  >
        <thead style="background-color: gray; font-size: 100%; color: white;">
              <tr>
                <th>#</th>
                <th>Payment ID</th>
                <th>Product Name</th>
                <th>Paid Qty</th>
                <th>Payment_Date</th>
                <th>Sales Order</th>
                <th>Ck Number</th>
                <th>Progress</th>
                <th>site</th>
                            
                
                
              </tr>
              </thead>
              <tbody>
              <?php
              // LOOP TILL END OF DATA

              
              $count=1;
              $result = veiw_all_payment();

              while ($rows = mysqli_fetch_assoc($result)) {


                ?>
              <tr>
                <td style="font-size: 120%;" ><?php echo $count; ?></td>
                <td><?php echo $rows['pay_id']; ?></td>
                <td><?php echo $rows['item_name']; ?></td>
                <td><?php echo $rows['pay_qty']; ?></td>
                <td><?php echo $rows['pay_date']; ?></td>
                <td><?php echo $rows['pay_so']; ?></td>
                <td><?php echo $rows['ck_num']; ?></td>                
                <td><a href="view_so_detail.php?pay_so=<?php echo $rows["pay_so"]; ?>"><button type="button" class="btn btn-block btn-primary btn-sm" name="detail"><b>View Progress</b></button></a></td>
                <td><a href="edit_pay.php?pay_id=<?php echo $rows["pay_id"]; ?>"><button type="button" class="btn btn-block btn-info btn-sm" name="edit" data-toggle="modal" data-target="#modal-info"><b>Edit</b></button></a></td>
                
                
                             
              </tr>
              <?php
              $count++;
              } 
              ?>
                              
            </tbody>
            </table> 
            <div class="box box-info"></div>

            


      </div>
      
  </section>
  <!-- /.content -->
</div>

<script>
$(document).ready( function () {
    $('#paytbl').DataTable();
} );
</script>

  <?php



include_once '../footer.php';


?>

