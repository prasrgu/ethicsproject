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
 <?php include ('general.php'); ?>
    <h2> <? echo "Welcome ".$_SESSION['ufname']; ?></h2>

    <div class="container" >
        <div class="row">

                <span class="col-md-2 col-md-offset-3"> <a href="pjform.php"><i class="fa fa-plus fa-5x"  aria-hidden="true"></i>New Project </a></span>


                <span class="col-md-2 "> <a href="projlist.php"><i class="fa fa-list fa-5x" aria-hidden="true" ></i>View Projects </a></span>
                <span class="col-md-2 "><a> <i class="fa fa-wrench fa-5x" aria-hidden="true"></i>Edit Profile</a></span>


            </div>
        </div>
    </div>

    </body>






</html>