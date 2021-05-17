<?php
ini_set('display_errors', '0');

$err = 0;

if(isset($_GET['err']))
{
    if($_GET['err']==1)
    {
        ini_set('display_errors', '1');
        $err = 1;
        echo "display error messaging enabled.";
    }
}

// $status = $err ? "enabled" : "disabled"; 
// echo "display error messaging " . $status . "<br>"; 

return $err;