<?php
/**
 * Created by PhpStorm.
 * User: AP1
 * Date: 20/04/2017
 * Time: 23:11
 */

$e1=$_GET['eao'];
$fvd=$_GET['projId'];
//$sdv = $_SERVER['QUERY_STRING'];
//echo $sdv;
$Query = explode('&', explode("?", $_SERVER['REQUEST_URI'])[1]);

echo substr($Query[1],4);
echo substr($Query[0],7);
echo substr($Query[2],4);
//if( count($Query)==3){
  //  $xcb="INSERT INTO staff_proj VALUES (substr($Query[1],4),)";
//}
//if(count($Query)==2)
 //   $xcb="INSERT INTO staff_proj VALUES (,)";

