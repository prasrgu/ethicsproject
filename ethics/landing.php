<?php
/**
 * Created by PhpStorm.
 * User: 1613112
 * Date: 12/04/2017
 * Time: 16:06
 */
if($_SERVER['REQUEST_METHOD'] ==='POST'){

    session_start();
    if($_SESSION['currentuser']!=null) {
        $presentuser = $_SESSION['currentuser'];
        print_r($_SESSION['currentuser']);
    }
    else{
        header ('location : index.php');
    }

}
?>
<h2> Welcome <? echo $presentuser['firstname']."!"; ?></h2>