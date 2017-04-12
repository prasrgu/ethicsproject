<?php
/**
 * Created by PhpStorm.
 * User: 1613112
 * Date: 12/04/2017
 * Time: 16:06
 */
    session_start();
if(isset($_SESSION['firstname'])) {


    print_r($_SESSION);
}
    
    else{
        header ('location : index.php');
    }


?>
<h2> Welcome <? echo $_SESSION['firstname']."!"; ?></h2>