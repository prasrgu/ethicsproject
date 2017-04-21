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

   mysqli_query($link,$aghd);
   mysqli_query($link,$xcb);
    header('location : success.php');
}
elseif(count($Query)==2) {
     $xcb2="INSERT INTO staff_proj VALUES (substr($Query[1],4),substr($Query[0],7))";
    mysqli_query($link,$xcb2);
     header('location : success.php');
}
else{
    session_start();
    $_SESSION['stvs'] = "You have Selected more than two variables";
    header('location: projassign.php');
}