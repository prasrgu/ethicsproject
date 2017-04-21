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
echo $Query[0];
echo $Query[1];
echo $Query[2];

