<?php
/**
 * Created by PhpStorm.
 * User: AP1
 * Date: 20/04/2017
 * Time: 16:38
 */

include('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Philosopher" rel="stylesheet">
    <link rel="stylesheet" href="style.css" >

    <script src="https://use.fontawesome.com/425f6058af.js"></script>



</head>
<body>
<?php
        $sqqq ="SELECT * FROM projects ";
       $answe= mysqli_query($link, $sqqq);
        if(mysqli_num_rows($answe)>0){
            echo "<table class='table table-striped'><thead><tr><td>Student Name</td><td>Student ID</td> <td>Project Title</td></tr></thead><tbody>";
        while($resu=mysqli_fetch_assoc($answe)) {
            $dse = "SELECT * FROM  student WHERE student_ID='{$resu['std_ID']}'";
                    $fds=mysqli_query($link, $dse);
                   $svd= mysqli_fetch_assoc($fds);
            echo "<tr><td>" . "<a href='projassign.php?p={$resu['id']}&sid={$resu['std_ID']}'>". $svd['firstname'] . "  ".$svd['lastname'] . "</a>". "</td><td>" . $svd['student_ID'] . "</td><td>" . $resu['title'] . "</td></tr>";
        }
        echo "</tbody></table>";
        }
        else{
            echo "There are no student projects at the moment. Please check back later";
        }
        ?>
</body>
</html>