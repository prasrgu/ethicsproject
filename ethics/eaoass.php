<?php
/**
 * Created by PhpStorm.
 * User: AP1
 * Date: 20/04/2017
 * Time: 23:11
 */
include('connection.php');
$e1=$_GET['eao'];
$fvd=$_GET['projId'];
//$sdv = $_SERVER['QUERY_STRING'];
//echo $sdv;
$Query = explode('&', explode("?", $_SERVER['REQUEST_URI'])[1]);

//echo substr($Query[1],4);
//echo substr($Query[0],7);
//echo substr($Query[2],4);
if( count($Query)==3){
   $xcb="INSERT INTO staff_proj VALUES (substr($Query[1],4),substr($Query[0],7))";
   $aghd = "INSERT INTO staff_proj VALUES (substr($Query[2],4),substr($Query[0],7))";
    if (mysqli_query($link, $aghd)) {
        echo "New record created successfully";
        header('location : success.php');
    } else {
        echo "Error: " . $aghd . "<br>" . mysqli_error($link);
    }
    if (mysqli_query($link, $xcb)) {
        echo "New record created successfully";
        header('location : success.php');
    } else {
        echo "Error: " . $xcb . "<br>" . mysqli_error($link);
    }


}
elseif(count($Query)==2) {
     $xcb2="INSERT INTO staff_proj VALUES (substr($Query[1],4),substr($Query[0],7))";
    if (mysqli_query($link, $xcb2)) {
        echo "New record created successfully";
        header('location : success.php');
    } else {
        echo "Error: " . $xcb2 . "<br>" . mysqli_error($link);
    }

}
else{
    session_start();
    $_SESSION['stvs'] = "You have Selected more than two variables";
    header('location: projassign.php');
}