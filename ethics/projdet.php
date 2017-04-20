<?php
/**
* Created by PhpStorm.
* User: AP1
* Date: 20/04/2017
* Time: 02:23
*/
session_start();
include ('connection.php');
include('general.php');
if(isset($_SESSION['ufname'])) {
    if($_SERVER['REQUEST_METHOD']==='GET') {
        $projId = $_GET['p'];
        $sss = "SELECT * FROM projects WHERE id = '$projId'";
        $reso = mysqli_query($link, $sss);
        $rest = mysqli_fetch_assoc($reso);
        $_SESSION['resi']=$rest;
        $re = $rest['submissionDate'];
        ?>
<h4>Title: <?php echo " ".$rest['title'] ?> </h4>
<h4>Description: <?php echo " ".$rest['description'] ?> </h4>
<h4>Submission Deadline: <?php echo " ".$rest['submissionDate'] ?> </h4>



    <?
        include ('fdetails.php');}
    elseif($_SERVER['REQUEST_METHOD']==='POST'){
        if (substr($_SESSION['uid'], 0, 1) === 'S') {
            $fold = "../wwwroot/";
            $uid = $_SESSION['uid'];
            $ud = $uid . "/";

            $imgFile = $_FILES['etdoc']['name'];
            $tmp_dir = $_FILES['etdoc']['tmp_name'];
            $imgSize = $_FILES['etdoc']['size'];
            $idd =  $_SESSION['resi']['id'];
            $et = $_SESSION['resi']['title'];
            $epto = $_SESSION['resi']['submissionDate'];
            $dest = $ud . $et;
            $desc = $_SESSION['resi']['description'];
            $dte = $_SESSION['resi']['submissionDate'];
            if (($imgSize < 1048576) && !empty($et) && !empty($epto)) {
                $ext = substr(strrchr($imgFile, "."), 1);

                echo $ext;


                if (($ext=="doc")||($ext=="docx")||($ext=="pdf")) {
                    move_uploaded_file($tmp_dir, $fold . $dest);
                    $imgurl = $fold . $dest;

                    $ssli = "UPDATE TABLE ethics SET url_location = '$imgurl' WHERE id='$idd'";
                    mysqli_query($link,$ssli);
                    $_SESSION['sucs']="Update Successful";
                }
            }
        }?>
<h4>Title: <?php echo " ".$et?> </h4>
<h4>Description: <?php echo " ".$desc ?> </h4>
<h4>Submission Deadline: <?php echo " ".$epto ?> </h4>

   <?
    include ('fdetails.php');
    }


}

else{
header ('location : index.php');
}
?>









