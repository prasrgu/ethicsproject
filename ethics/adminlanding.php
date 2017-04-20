<?php
/**
 * Created by PhpStorm.
 * User: AP1
 * Date: 20/04/2017
 * Time: 16:38
 */

include('connection.php');

        $sqqq ="SELECT * FROM projects ";
       $answe= mysqli_query($link, $sqqq);
        if(mysqli_num_rows($answe)>0){
            echo "<table class='table table-striped'><thead><tr><td>Student Name</td><td>Student ID</td> <td>Project Title</td></tr></thead><tbody>";
        while($resu=mysqli_fetch_assoc($answe)) {
            $dse = "SELECT * FROM  student WHERE student_ID='{$resu['std_ID']}'";
                    $fds=mysqli_query($link, $dse);
                   $svd= mysqli_fetch_assoc($fds);
            echo "<tr><td>" . "<a href='projdet.php?p={$resu['id']}&sid={$resu['std_ID']}'>". $svd['firstname'] . "  ".$svd['lastname'] . "</a>". "</td><td>" . $svd['student_ID'] . "</td><td>" . $resu['title'] . "</td></tr>";
        }
        echo "</tbody></table>";
        }