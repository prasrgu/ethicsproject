<?php
/**
 * Created by PhpStorm.
 * User: AP1
 */
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
                <button type="submit" class="btn btn-primary">Update</button>
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

            <div>
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
            </div>


        </div>


    <?}

    if(isset($_SESSION['sucs'])){
        echo "{$_SESSION['secs']}";
    }
    ?>
</fieldset>
