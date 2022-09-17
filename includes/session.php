<?php

if(!session_start())
{
    session_start();
}


?>

<?php

function message(){
if (isset($_SESSION["message"])) {

    $output = "<div class=\"alert alert-success mb-0\">";
    $output .= "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\"></button>";
    $output .= "<strong>Success! </strong> ".$_SESSION["message"] ."</div>";

    // clear message after use
    $_SESSION["message"] = null;

    return $output;
}
}

?>