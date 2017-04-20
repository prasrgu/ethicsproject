<?php
/**
 * Created by PhpStorm.
 * User: 1613112
 * Date: 12/04/2017
 * Time: 16:06
 */
    session_start();
if(isset($_SESSION['ufname'])) {



}
    
    else{
        header ('location : index.php');
    }


?>



<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <?php include ('general.php'); ?>
    <h2> <? echo "Welcome ".$_SESSION['ufname']; ?></h2>

    <div class="container" >
        <div class="row">
            <div class = "col-md-4 col-md-offset-4 space">
                <span class="cent"> <a href="pjform.php"><i class="fa fa-plus fa-5x"  aria-hidden="true"></i>New Ethics </a></span>
                <span class="cent"><a> <i class="fa fa-pencil-square-o fa-5x" aria-hidden="true"></i>Edit Project</a></span>


            </div>
            <div class = "col-md-4 col-md-offset-4 space">
                <span class="cent"> <a href="projlist.php"><i class="fa fa-list fa-5x" aria-hidden="true" ></i>View Projects </a></span>
                <span class="cent"><a> <i class="fa fa-wrench fa-5x" aria-hidden="true"></i>Edit Profile</a></span>


            </div>
        </div>
    </div>

    </body>






</html>