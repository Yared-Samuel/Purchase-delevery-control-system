<?php
include_once '../includes/session.php';

include_once '../includes/connection.php';
include_once '../includes/functions.php';
message();
if (isset($_POST['login_btn'])) {
    # code...
    $email=mysqli_real_escape_string($GLOBALS['mysqli'],$_POST['email']);
    $password=mysqli_real_escape_string($GLOBALS['mysqli'],$_POST['Password']);

    $login_query="SELECT * FROM user_tbl WHERE useremail='$email' AND password='$password' LIMIT 1";
    $login_query_run=$GLOBALS['mysqli']->query($login_query);

    if (mysqli_num_rows($login_query_run) > 0) 
    {

    foreach ($login_query_run as $data) {
        $user_id = $data['userid'];
        $user_name = $data['username'];
        $user_email = $data['useremail'];
        $role = $data['role'];
    }
        $_SESSION['auth'] = true;
        $_SESSION['auth_role'] = "$role";// admin = admin and user = user
        $_SESSION['auth_user'] = [
            'user_id'=>$user_id,
            'user_name'=>$user_name,
            'user_email'=>$user_email,
        ];
        if ($_SESSION['auth_role'] == "admin") 
        {
           
            
            $_SESSION['message'] = "Well Come to Admin Dashboard";
            $new_location= "../admin/add_payment.php";
            redirect_to($new_location);
            exit(0);
        }elseif ($_SESSION['auth_role'] == "user") 
        {
            $_SESSION['message'] = "Logged In";
            $new_location= "../admin/edit_pay.php";
            redirect_to($new_location);
            exit(0);
        }
        
    }elseif ($_SESSION['auth_role'] == "report") {
            $_SESSION['message'] = "Well Come to Admin Dashboard";
            $new_location= "../admin/edit_pay.php";
            redirect_to($new_location);
            exit(0);
    }
    else 
    {
        $_SESSION['message'] = "invalid email or password";
    $new_location= "login.php";
    redirect_to($new_location);
    exit(0);
    }

}else
{
    $_SESSION['message'] = "You are not allowed to access this file";
    $new_location= "login.php";
    redirect_to($new_location);
    exit(0);

}



?>