<?php
/**
 * Created by PhpStorm.
 * User: AP1
 * Date: 30/04/2017
 * Time: 16:29
 */
$method  = $_SERVER['REQUEST_METHOD'];
$req = explode ("/", substr(@$_SERVER['PATH_INFO'], 1));

switch($method){
    case 'PUT':
        echo $req;
        break;
    case 'POST':
        echo $req;
        break;
    case 'GET':
        var_dump($req) ;
        print_r($req);
        break;
    case 'DELETE':
        echo $req;
        break;
    default:
        echo "I do not understand You";


}
