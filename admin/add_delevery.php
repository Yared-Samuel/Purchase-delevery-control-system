<?php
include_once '../includes/session.php';
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
      <li><a href="add_payment.php"><i class="fa fa-dashboard"></i> Back</a></li>
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
                <input type="date" class="form-control pull-right" id="datepicker" name="del_date" date_format required>
              </div>
              <!-- /.input group -->
            </div>

            <div class="col-sm-3">
                         <label>Sales Order With respect to item</label>
                       <select class="form-control"  name="del_so" required>                    
                         <option value="" disabled selected>Sales Order</option>
                           <?php 
                                   
                                   $query ="SELECT pay_date,pay_so,del_so,item_name,item.item_id,pay_qty - Sum(del_qty) AS remaining FROM pay_tbl JOIN item ON pay_tbl.item_id = item.item_id LEFT JOIN delevered ON delevered.del_so = pay_tbl.pay_so
                                   GROUP BY pay_so,pay_qty,del_so HAVING remaining > 0 OR del_so IS NULL ORDER BY `pay_so` DESC
                                             ";

                                  // $query = "SELECT item_name,pay_so, pay_date,pay_qty, Sum(del_qty) AS delev, pay_qty - Sum(del_qty) AS remaining 
                                            
                                  // FROM `pay_tbl` JOIN delevered ON pay_tbl.pay_so = delevered.del_so 
                                  // JOIN item ON pay_tbl.item_id = item.item_id GROUP BY pay_so
                                  // HAVING pay_qty - SUM(del_qty) != 0 
                                  // -- AND NOT IN (SELECT del_so FROM delevered) 
                                  // ORDER BY remaining DESC";


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
                         <option value="<?php echo $option; ?>"><?php echo $item_name ." ....... ". $option." ....... ".$remaining; ?></option>
         
                         <?php 
                             continue;
                         }?> 
                         <option value="<?php echo $option ; ?>"><?php echo $item_name ." ....... ". $option." ....... ".$remaining; ?></option>
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



<div class="box box-info" style="overflow-x: scroll;">
<div class="box-header"  style="background-color:ivory; font-size: 120%; color: black;"> Delevered Products</div>
  <div class="box box-info"></div>
        <table id="deleverytbl" class="table table-sm hover cell-border compact stripe display nowrap">
  <thead style="background-color: gray; font-size: 100%; color: white;">
              <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Delevered Qty</th>
                <th>Date</th>
                <th>Sales Order</th>
                <th>Reference Number</th>
                 
                
                
              </tr>
              </thead>
              <tbody>
              <?php
              // LOOP TILL END OF DATA

              
              
              $result = veiw_all_delevery();

              while ($rows = mysqli_fetch_assoc($result)) {


                ?>
              <tr>
                <td><?php echo $rows['del_id']; ?></td>
                <td><?php echo $rows['item_name']; ?></td>
                <td><?php echo $rows['del_qty']; ?></td>
                <td><?php echo $rows['del_date']; ?></td>
                <td><?php echo $rows['del_so']; ?></td>
                <td><?php echo $rows['del_ref']; ?></td>
                
                
                
                             
              </tr>
              <?php
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

$(document).ready(function() {
  $('#deleverytbl').DataTable({
    "order": [
      [3, "desc"]
    ],
    dom: 'lBfrtip',
    buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
  });
});



// $(document).ready( function () {
//     $('#deleverytbl').DataTable({
//     "order": [
//       [3, "DESC"]
//     ],
    
//     buttons: [
//             'copy', 'csv', 'excel', 'pdf', 'print'
//         ]

//       });

// } );
</script>



  <?php

include_once '../footer.php';


?>