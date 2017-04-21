<?php
/**
 * Created by PhpStorm.
 * User: AP1
 * Date: 20/04/2017
 * Time: 17:21
 */
include ('connection.php');
session_start();

if(isset($_SESSION['uid'])) {
    $sos = "SELECT * FROM projects WHERE id IN (SELECT projID FROM staff_proj WHERE staffId='{$_SESSION['uid']}')";

        $sdvsd=mysqli_query($link, $sos);
        if(mysqli_num_rows($sdvsd)>0){?>
            <table>
                <thead>
                    <tr>
                        <th> Project Title</th>
                        <th> Student Name</th>
                        <th>Submission Deadline</th>

                    </tr>

                </thead>
                <tbody>
                <?php while($sdsd=mysqli_fetch_assoc($sdvsd)) {
                        $cvbd = "SELECT firstname, lastname FROM student WHERE student_ID = '{$sdsd['std_ID']}'";
                        $ed = mysqli_query($link, $cvbd);
                        $sva= mysqli_fetch_assoc($ed);
                    ?>
                    <tr >
                        <td ><a href=projinfo?p=<?echo $sdvd['id'];?>><? echo $sdsd['title'];?></a> </td >
                    <td ><? echo $sva['firstname']. "  ".$sva['firstname'];?>  </td >
                    <td ><? echo $sdsd['submissionDate'];?></td >

                </tr >
               <? }

                ?>
                </tbody>
            </table>
      <?  }
        else{
            ?>
            <h3> You Currently Have no projects Allocated to you at the Moment. Please Check Back Later </h3>
        <?php
        }

            }else{
            header('location : index.php');
}