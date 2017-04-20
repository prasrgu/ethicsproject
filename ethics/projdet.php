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


    <?}
    else{
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
   <? }


}

else{
header ('location : index.php');
}
?>





    <fieldset>
                <?php
                $date1 = new DateTime($re);
                $dtoday = date('Y-m-d');
                $date2 = new DateTime($dtoday);
                $diff = $date2->diff($date1)->format("%a");
                    if($diff>1){?>
                        <form action="projdet.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="form-group">
                                <label for="etfile" class="col-md-2 col-md-offset-2 control-label">Update Ethics</label>
                                <div class="col-md-4">
                                    <input type="file" name="etfile" class="form-control"/>
                                </div>
                                <button type="submit">Update</button>
                        </form>
                   <?php }
                   elseif($diff<1){
                        ?>
                        <div>
                            <div>
                                    <?php
                                        $fed="SELECT * FROM feedback WHERE proj_ID = '$projId'";
                                        $fedar=mysqli_query($link, $fed);
                                        if(mysqli_num_rows($fedar)>0) {
                                            echo "<table> <thead><th>Feedback Detail </th> <th>Feedback Date</th></thead><tbody>";
                                            while ($resolu = mysqli_fetch_assoc($fedar)) {
                                              echo "<tr><td>".$resolu['detail']."</td>"."<td>".$resolu['fback_Date']."</td></tr>";
                                            }
                                           echo"</tbody></table>";
                                        }

                                    ?>
                            </div>
                            <?php
                            $com="SELECT * FROM comments WHERE proj_ID = '$projId'";
                            $comar=mysqli_query($link, $com);
                            if(mysqli_num_rows($comar)>0) {
                                echo "<table> <thead><th>Comment Detail </th> <th>Comment Date</th> <th>Commenter</th></thead><tbody>";
                                while ($resola = mysqli_fetch_assoc($comar)) {
                                    $sso = "SELECT firstname, lastname FROM staff WHERE staff_ID='{$resola['staff_ID ']}'";
                                   $cds= mysqli_query($link, $sso);
                                   $sfd=mysqli_fetch_assoc($cds);
                                    echo "<tr><td>".$resola['details']."</td><td>".$resola['commentDate ']."</td><td>".$sfd['staff_ID ']."</td></tr>";
                                }
                                echo"</tbody></table>";
                            }

                            ?>
                            <div>
                            </div>


                        </div>


                   <?}

                    if(isset($_SESSION['sucs'])){
                        echo "{$_SESSION['secs']}";
                    }
                ?>
    </fieldset>



