<?php
/**
* Created by PhpStorm.
* User: AP1
* Date: 20/04/2017
* Time: 02:23
*/
session_start();
include ('connection.php');
if(isset($_SESSION['ufname'])) {
    $projId = $_GET['p'];
    $sss = "SELECT * FROM projects WHERE id = '$projId'";
    $reso=mysqli_query($link, $sss);
   $rest= mysqli_fetch_assoc($reso);
   $re = $rest['submissionDate'];





}

else{
header ('location : index.php');
}
?>
<?php include('general.php'); ?>


    <h4>Title: <?php echo " ".$rest['title'] ?> </h4>
    <h4>Description: <?php echo " ".$rest['description'] ?> </h4>
    <h4>Submission Deadline: <?php echo " ".$rest['submissionDate'] ?> </h4>

    <fieldset>
                <?php
                $date1 = new DateTime($re);
                $dtoday = date('Y-m-d');
                $date2 = new DateTime($dtoday);
                $diff = $date2->diff($date1)->format("%a");
                echo $diff;


                ?>
    </fieldset>



