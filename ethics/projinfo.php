<?php
/**
 * Created by PhpStorm.
 * User: AP1
  */

include ('connection.php');

$pid = $_GET['p'];
session_start();

$sab = "SELECT * FROM projects WHERE id = '$pid'";
    $d=mysqli_query($link, $sab);
$sddg = mysqli_fetch_assoc($d);


if(!isset($_SESSION['uid'])) {
    header('location : index.php');

}
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
        <h4>Project Name: <?php echo "  ".$sddg['title']?></h4>
        <h4>Description: <?php echo "  ".$sddg['description']?></h4>
        <h4>Submission Deadline: <?php echo "  ".$sddg['submissionDate']?></h4>




</body>
</html>