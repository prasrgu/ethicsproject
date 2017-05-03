<?php
/**
 * Created by PhpStorm.
 * User: AP1
  */
session_start();
include ('connection.php');
if(isset($_SESSION['ufname'])) {



}

else{
    header ('location : index.php');
}
?>

  <?php include('general.php'); ?>


    <table class="table table-striped">
        <thead>
        <tr>
            <th>Title</th>
            <th>Submission Date</th>

        </tr>
        </thead>
        <tbody>

                <?php $sq2 = "SELECT * FROM projects WHERE std_ID='{$_SESSION['uid']}'" ;
                         $reso =   mysqli_query($link, $sq2);
                         echo "no o r: ".mysqli_num_rows($reso);
                         while ($rowen = mysqli_fetch_assoc($reso)){

                                 echo "<tr><td>" . "<a href='projdet.php?p={$rowen['id']}'>". $rowen['title'] ."</a>". "</td><td>" . $rowen['submissionDate'] . "</td></tr>";

                         }

                ?>

        </tbody>
    </table>