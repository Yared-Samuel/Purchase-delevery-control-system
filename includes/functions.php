<?php


function redirect_to($new_location)
{
    header("Location: " . $new_location);
    exit;
}

function veiw_all_delevery()
{
        
    $select = "SELECT del_id,item_name,del_qty,del_date,del_so,del_ref 
            FROM delevered
            JOIN item ON delevered.item_id = item.item_id ORDER BY del_date ASC";

$result = $GLOBALS['mysqli']->query($select);
//$result=$select->execute();
return $result;
}

function veiw_all_payment()
{
        
    $select = "SELECT pay_id,item_name,pay_qty,pay_date,pay_so,ck_num,pay_site
            FROM pay_tbl
            JOIN item ON pay_tbl.item_id = item.item_id ORDER BY pay_date DESC";

$result = $GLOBALS['mysqli']->query($select);
//$result=$select->execute();
return $result;
}
function veiw_reorder()
{
        
    $select = "SELECT item_name,date_reo,old_qty,new_qty,old_so,new_so
            FROM pay_reorder JOIN item ON pay_reorder.item_id=item.item_id";

$result = $GLOBALS['mysqli']->query($select);
//$result=$select->execute();
return $result;
}

// function veiw_all_payment_by_id($pay_id)
// {

//      $select = "SELECT pay_id,item_name,pay_qty,pay_date,pay_so,ck_num,pay_site
//             FROM pay_tbl
//             JOIN item ON pay_tbl.item_id = item.item_id 
//             WHERE pay_id='$pay_id'";

// $result = $GLOBALS['mysqli']->query($select);
// $rows=$result->fetch_assoc();

// //$result=$select->execute();
// return $rows;
// }

 

 function add_payment()
 {

  $year_current = date("Y");
  
  
  

      if (isset($_POST['pay'])) {
        $pay_date=$_POST['pay_date'];
        $item_id=$_POST['item_id'];
        $pay_so=$year_current."00".$_POST['pay_so'];
        $pay_qty=$_POST['pay_qty'];
        $pay_site=$_POST['pay_site'];
        $ck_num=$_POST['ck_num'];

        $insert="INSERT INTO pay_tbl (pay_date,item_id,pay_so,pay_qty,pay_site,ck_num) 
                VALUES ('$pay_date','$item_id','$pay_so','$pay_qty','$pay_site','$ck_num')";
          

          $input_data = $pay_so;
          $compare_data = 'pay_so';
          $tbl = 'pay_tbl';

                  
          $result = $GLOBALS['mysqli']->query($insert);
        
        if ($result) {


          
            echo  '<script type="text/javascript" >
                            jQuery(function validation(){
                        
                              swal({
                                title: "Payment Updated!",
                                text: "Payment Added Successfully.",
                                icon: "success",
                                button: "ok",
                              });
                            });        
                                    </script>';
        
            
        }else{
          echo  '<script type="text/javascript" >
                          jQuery(function validation(){
              
                    swal({
                      title: "Error!",
                      text: "Failed to execute",
                      icon: "error",
                      button: "ok",
                    });
                  });        
                          </script>';
        }
      

    }
 }

 function edit_payment($pay_id)
 {

  

      if (isset($_POST['edit_pay'])) {
        $pay_date=$_POST['pay_date'];
        $item_id=$_POST['item_id'];
        $pay_so=$_POST['pay_so'];
        $pay_qty=$_POST['pay_qty'];
        $pay_site=$_POST['pay_site'];
        $ck_num=$_POST['ck_num'];

        $update="UPDATE `pay_tbl` SET pay_date='$pay_date', item_id='$item_id', pay_so='$pay_so', 
            pay_qty='$pay_qty', pay_site='$pay_site', ck_num='$ck_num' where pay_id='$pay_id'  
            ";
          

          

                  
          $result = $GLOBALS['mysqli']->query($update);
        
        if ($result) {


          
            echo  '<script type="text/javascript" >
                            jQuery(function validation(){
                        
                              swal({
                                title: "Payment Updated!",
                                text: "Payment Updated Successfully.",
                                icon: "success",
                                button: "ok",
                              });
                            });        
                                    </script>';
        
                                    // header("Location: add_payment.php");
        }else{
          echo  '<script type="text/javascript" >
                          jQuery(function validation(){
              
                    swal({
                      title: "Error!",
                      text: "Failed to execute",
                      icon: "error",
                      button: "ok",
                    });
                  });        
                          </script>';
        }
      

    }
 }

//  function reorder_payment($pay_id)
//  {

  

//       if (isset($_POST['edit_pay'])) {
//         $pay_date=$_POST['pay_date'];
//         $item_id=$_POST['item_id'];
//         $pay_so=$_POST['pay_so'];
//         $pay_qty=$_POST['pay_qty'];
//         $pay_site=$_POST['pay_site'];
//         $ck_num=$_POST['ck_num'];

//         $update="UPDATE `pay_tbl` SET pay_date='$pay_date', item_id='$item_id', pay_so='$pay_so', 
//             pay_qty='$pay_qty', pay_site='$pay_site', ck_num='$ck_num' where pay_id='$pay_id'  
//             ";
          

          

                  
//           $result = $GLOBALS['mysqli']->query($update);
        
//         if ($result) {


          
//             echo  '<script type="text/javascript" >
//                             jQuery(function validation(){
                        
//                               swal({
//                                 title: "Payment Updated!",
//                                 text: "Payment Updated Successfully.",
//                                 icon: "success",
//                                 button: "ok",
//                               });
//                             });        
//                                     </script>';
        
//                                     // header("Location: add_payment.php");
//         }else{
//           echo  '<script type="text/javascript" >
//                           jQuery(function validation(){
              
//                     swal({
//                       title: "Error!",
//                       text: "Failed to execute",
//                       icon: "error",
//                       button: "ok",
//                     });
//                   });        
//                           </script>';
//         }
      

//     }
//  }

 function add_delevery()
 {

  $item_id="";
    if (isset($_POST['addemp'])) {
        $del_date=$_POST['del_date'];        
        $del_so=$_POST['del_so'];
        $del_qty=$_POST['del_qty'];
        $del_ref=$_POST['del_ref'];
        $item_id=item_by_so($del_so);

        $insert="INSERT INTO delevered (del_date,item_id,del_so,del_qty,del_ref) 
                VALUES ('$del_date','$item_id','$del_so','$del_qty','$del_ref')";


        $result = $GLOBALS['mysqli']->query($insert);
        if ($result) {
            echo  '<script type="text/javascript" >
                            jQuery(function validation(){
                        
                              swal({
                                title: "Product Delevered!",
                                text: "Product Added Successfully.",
                                icon: "success",
                                button: "ok",
                              });
                            });        
                                    </script>';
        }else{
            echo  '<script type="text/javascript" >
                          jQuery(function validation(){
              
                    swal({
                      title: "Error!",
                      text: "Failed to execute",
                      icon: "error",
                      button: "ok",
                    });
                  });        
                          </script>';
        }

    }
 }


 function item_by_so($pay_so){

  $sql = "SELECT item_id FROM pay_tbl WHERE pay_SO = '$pay_so'";

  $result = $GLOBALS['mysqli']->query($sql);

  $row = mysqli_fetch_array($result);

  return $row['item_id'];

  
 }





 function so_remain(){
  $sql = "SELECT item_name,pay_so, pay_date,pay_qty, Sum(del_qty) AS delev, pay_qty - Sum(del_qty) AS remaining  
          FROM `pay_tbl` JOIN delevered ON pay_tbl.pay_so = delevered.del_so 
          JOIN item ON pay_tbl.item_id = item.item_id
          WHERE pay_so NOT IN (SELECT old_so FROM pay_reorder INNER JOIN pay_tbl ON pay_reorder.old_so=pay_tbl.pay_so)
          GROUP BY pay_so
          HAVING pay_qty - SUM(del_qty) <> 0 ORDER BY pay_date DESC";

$result = $GLOBALS['mysqli']->query($sql);

return $result;

    
 }

 function so_remain_by_so($col){
  
  $so=$_GET['pay_so'];
  $sql = "SELECT pay_id,item.item_id,item_name,pay_so, pay_date,pay_qty,ck_num, Sum(del_qty) AS delev, pay_qty - Sum(del_qty) AS remaining  
          FROM `pay_tbl` JOIN delevered ON pay_tbl.pay_so = delevered.del_so 
          JOIN item ON pay_tbl.item_id = item.item_id 
          WHERE pay_so = '$so'
          GROUP BY pay_so
          HAVING pay_qty - SUM(del_qty) <> 0 ORDER BY pay_date DESC";

$result = $GLOBALS['mysqli']->query($sql);
$rows = mysqli_fetch_assoc($result);
$result=$rows[$col];
return $result;

    
 }

 //price change adjustment

function reorder_pay(){
  if (isset($_POST['Re_Order'])) {

    $rem="remaining";
    $remaining=so_remain_by_so($rem);
    $old_so="pay_so";
    $old_so=so_remain_by_so($old_so);
    $original_paid="pay_qty";
    $paid=so_remain_by_so($original_paid);
    $date_pay="pay_date";
    $pay_date=so_remain_by_so($date_pay);
    $ck="ck_num";
    $ck_num=so_remain_by_so($ck);

    // $new_qty_payment=$paid - $remaining;

    $new_price=$_POST['new_price'];
    $old_price=$_POST['old_price'];

      //calculate the new quantity and make it negative number
    $pay_qty_float=($old_price / $new_price) * $remaining;
    $pay_qty=floor($pay_qty_float);

    $item="item_id";
    $item_id=so_remain_by_so($item);
      
    $pay_so=$_POST['new_so'];    
    $pay_site="Reordered";
    // echo $pay_qty;

    //insert the new quantity and so to pay_tbl as a new paiment
    $insert_reorder="INSERT INTO pay_tbl (pay_date,item_id,pay_so,pay_qty,pay_site,ck_num) 
            VALUES ('$pay_date','$item_id','$pay_so','$pay_qty','$pay_site','$ck_num')";          
      $result1 = $GLOBALS['mysqli']->query($insert_reorder);

      //insert into pay_reorder table
    $insert_reorder2="INSERT INTO pay_reorder(item_id,date_reo,old_qty,new_qty,old_so,new_so)
                      VALUES('$item_id','$pay_date','$remaining','$pay_qty','$old_so','$pay_so')";

    $result2 = $GLOBALS['mysqli']->query($insert_reorder2);

    // $update_pay_qty="INSERT INTO pay_tbl (pay_date,item_id,pay_so,pay_qty,pay_site,ck_num) 
    //                     VALUES ('$pay_date','$item_id','$pay_so','$pay_qty','$pay_site','$ck_num')";
    // $result3 = $GLOBALS['mysqli']->query($update_pay_qty);


    
    if ($result1 && $result2) {


      
        echo  '<script type="text/javascript" >
                        jQuery(function validation(){
                    
                          swal({
                            title: "Payment Updated!",
                            text: "Payment Re-ordered.",
                            icon: "success",
                            button: "ok",
                          });
                        });        
                                </script>';
    
        
    }else{
      echo  '<script type="text/javascript" >
                      jQuery(function validation(){
          
                swal({
                  title: "Error!",
                  text: "Failed to execute",
                  icon: "error",
                  button: "ok",
                });
              });        
                      </script>';
    }
}


// function balance_reorder(){


//     $rem="remaining";
//     $pay_qty_old=so_remain_by_so($rem);

//     // $update="UPDATE `pay_tbl` SET pay_date='$pay_date', item_id='$item_id', pay_so='$pay_so', 
//     //         pay_qty='$pay_qty', pay_site='$pay_site', ck_num='$ck_num' where pay_id='$pay_id'  
//     //         ";


// }

}

 function total_so_remain(){
  $sql = "SELECT item_name,pay_so, pay_date,pay_qty,SUM(pay_qty) - Sum(del_qty) AS diff 
          FROM `pay_tbl` JOIN delevered ON pay_tbl.pay_so = delevered.del_so 
          JOIN item ON pay_tbl.item_id = item.item_id GROUP BY item_name";

$result = $GLOBALS['mysqli']->query($sql);

return $result;

    
 }

 function so_new_paid(){
  $sql = "SELECT item_name,pay_so, pay_date,pay_qty FROM pay_tbl 
  JOIN item ON pay_tbl.item_id = item.item_id 
  WHERE pay_so NOT IN (SELECT del_so FROM delevered)";

$result = $GLOBALS['mysqli']->query($sql);

return $result;

    
 }



//  function so_total_remain(){
 
//   $sql1 = "SELECT SUM(remaining) AS total FROM (SELECT item_name,pay_so, pay_date,pay_qty, Sum(del_qty) AS delev, pay_qty - Sum(del_qty) AS remaining  
//                   FROM `pay_tbl` JOIN delevered ON pay_tbl.pay_so = delevered.del_so 
//                   JOIN item ON pay_tbl.item_id = item.item_id GROUP BY pay_so
//                   HAVING pay_qty - SUM(del_qty) != 0 && item_id = 2 ORDER BY remaining DESC) ";

// $result = $GLOBALS['mysqli']->query($sql1);

// $rows = mysqli_fetch_assoc($result);
// echo $rows['total'];

    
//  }

 function filter_item_bydate(){

  // if(isset($_GET['from_date']) && isset($_GET['to_date']) && isset($_GET['$item_id']))
  if(isset($_POST['submit']))
  {
    
      $from_date = $_POST['from_date'];
      $to_date = $_POST['to_date'];
      $item_id = $_POST['item_id'];
     // $del_so  = $_POST['del_so'];

      $query = "SELECT item_name,del_qty,del_date,del_so,del_ref 
                FROM delevered JOIN item ON delevered.item_id = item.item_id  
                WHERE (del_date BETWEEN '$from_date' AND '$to_date')                
                AND ('$item_id' is null OR delevered.item_id = '$item_id')
                Order by item_name DESC,del_date
              
              ";
      
      $query_run = $GLOBALS['mysqli']->query($query);
      
      return $query_run;

  }else {
    $query = "SELECT item_name,del_qty,del_date,del_so,del_ref 
                FROM delevered JOIN item ON delevered.item_id = item.item_id  
                Order by del_date DESC,item_name LIMIT 7              
              ";

$query_run = $GLOBALS['mysqli']->query($query);
      
return $query_run;

  }

 }

 function filter_total_item_bydate(){

  // if(isset($_GET['from_date']) && isset($_GET['to_date']) && isset($_GET['$item_id']))
  if(isset($_POST['submit']))
  {
      $from_date = $_POST['from_date'];
      $to_date = $_POST['to_date'];
      $item_id = $_POST['item_id'];

      $query = "SELECT delevered.item_id,item_name,del_date,SUM(del_qty) AS totaldel 
                FROM delevered JOIN item ON delevered.item_id = item.item_id             
                WHERE (del_date BETWEEN '$from_date' AND '$to_date') 
                GROUP BY item_id
                -- AND  delevered.item_id = '$item_id' 
                HAVING '$item_id' is null OR delevered.item_id = '$item_id'
                
                ";
      
      $result = $GLOBALS['mysqli']->query($query);
      
      return $result;

  }

 }

 function filter_daily(){

  // if(isset($_GET['from_date']) && isset($_GET['to_date']) && isset($_GET['$item_id']))
  if(isset($_POST['submit']))
  {
      
      $date = $_POST['date'];
      

      $query = "SELECT delevered.item_id,item_name,del_date,SUM(del_qty) AS totaldel 
                FROM delevered JOIN item ON delevered.item_id = item.item_id             
                WHERE (del_date = '$date') 
                GROUP BY item_id
                ";
      
      $result = $GLOBALS['mysqli']->query($query);
      
      return $result;

  }else {
    // $date = date('Y-m-d');
    // $date_last_week= date('d.m.Y',strtotime("-5 days"));
    $query = "SELECT delevered.item_id,item_name,del_date,del_qty AS totaldel 
                FROM delevered JOIN item ON delevered.item_id = item.item_id 
                Order by del_date DESC LIMIT 7 
                ";
    $result = $GLOBALS['mysqli']->query($query);
      
    return $result;
  }

 }


 function view_del_by_so(){
  $so=$_GET['pay_so'];
  
  $sql = "SELECT del_id,item_name,del_so,del_qty,del_date,del_ref,pay_so,pay_date,pay_qty
  
   FROM delevered
          JOIN item ON delevered.item_id = item.item_id
          JOIN pay_tbl ON delevered.del_so = pay_tbl.pay_so
  WHERE del_so = '$so'   
  
  ORDER BY del_date DESC";



$result = $GLOBALS['mysqli']->query($sql);

return $result;
 }



 function filter_price()
 {
  $select="SELECT item.item_id,item_name,price_start_date,price_end_date,price FROM price_tbl JOIN item ON price_tbl.item_id=item.item_id ORDER BY price_start_date DESC";
  $result=$GLOBALS['mysqli']->query($select);
  return $result;
 }

 function add_price()
 {
  if (isset($_POST['add_price'])) {
    
    $item_id=$_POST['item_id'];
    $price_date=$_POST['date'];
    $price=$_POST['new_price'];

    $insert="INSERT INTO price_tbl (price_start_date,item_id,price) VALUES('$price_date','$item_id','$price')";

    $result=$GLOBALS['mysqli']->query($insert);

    if ($result) {


      
      echo  '<script type="text/javascript" >
                      jQuery(function validation(){
                  
                        swal({
                          title: "Successfull!",
                          text: "price Changed",
                          icon: "success",
                          button: "ok",
                        });
                      });        
                              </script>';
  
      
  }else{
    echo  '<script type="text/javascript" >
                    jQuery(function validation(){
        
              swal({
                title: "Error!",
                text: "Failed to execute",
                icon: "error",
                button: "ok",
              });
            });        
                    </script>';
  }


  }
 }


 function filter_item()
 {
  $select="SELECT item_id,item_name,item_category FROM  item ORDER BY item_category DESC";
  $result=$GLOBALS['mysqli']->query($select);
  return $result;
 }

 function add_item()
 {
  if (isset($_POST['add_item'])) {
    
    $item_name=$_POST['item_name'];
    $item_category=$_POST['item_category'];
    

    $insert="INSERT INTO item (item_name,item_category) VALUES('$item_name','$item_category') ";

    $result=$GLOBALS['mysqli']->query($insert);

    if ($result) {


      
      echo  '<script type="text/javascript" >
                      jQuery(function validation(){
                  
                        swal({
                          title: "Successfull!",
                          text: "Item Created",
                          icon: "success",
                          button: "ok",
                        });
                      });        
                              </script>';
  
      
  }else{
    echo  '<script type="text/javascript" >
                    jQuery(function validation(){
        
              swal({
                title: "Error!",
                text: "Failed to execute",
                icon: "error",
                button: "ok",
              });
            });        
                    </script>';
  }


  }
 }


 


 

 











?>