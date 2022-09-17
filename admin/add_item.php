<?php
include_once '../includes/connection.php';
include_once '../includes/functions.php';
include_once '../header.php';

add_item();

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
                  
                  
                  <div class="col-md-6">
                      <label >Item Name<small></small></label>
                      <input type="text" class="form-control " placeholder="required field" name="item_name" required>
                  </div>

                  <div class="col-md-6">
                      <label >Category<small></small></label>
                      <select class="form-control"  name="item_category" required>
                      
                        <option value="beer">Beer<small>  /  measures with Create</small></option>
                        <option value="draft">Draft<small>  /  measures with Keg</small></option>                        
                      </select>
                  </div>

                            
                  <div class="col-md-12">
                  <button type="submit" class="btn btn-info form-control" name="add_item" required>Submit</button>
                  </div>             

              </div> 
              

              <div class="col-xs-6">
          
          <div class="table-responsive">
            <table class="table table-striped" id="del">
            <thead style="background-color: gray; font-size: 100%; color: white;">
                <tr>
                <th>item Code</th>
                <th>Product Name</th>               
                <th>Category</th>
                       
                </tr>
              </thead>
              <tbody>
              <?php
              // LOOP TILL END OF DATA

              
              
              $result = filter_item();

              if($result != NULL)
              {
                foreach($result as $row)
                                        {


                ?>
                
                 <tr>
                 <td class="col-md-1"><?php echo $row['item_id']; ?></td> 
                 <td class="col-md-2"><?php echo $row['item_name']; ?></td>
                 <td class="col-md-2"><?php echo $row['item_category']; ?></td>
                
                </tr>
                <?php
              
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





            

      </div>
      
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