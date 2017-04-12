<?php
include('index.php');

if($_SERVER['REQUEST_METHOD'] ==='POST'){


    if($_SESSION['currentuser']!=null) {

        print_r($_SESSION);
    }
    else{
        header ('location : index.php');
    }

}
?>
<h2> Welcome <? echo $_SESSION['currentuser']['firstname']."!"; ?></h2>