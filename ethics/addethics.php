<?php
session_start();
include('connection.php');

if (isset($_SESSION['ufname'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (!empty($_POST['ptitle']) && !empty($_POST['pdesc']) && !empty($_POST['psubdate'])) {

            $curdate = date("d-m-Y");
            $ptitle = $_POST['ptitle'];
            $pdesc = $_POST['pdesc'];
            $psubdate = ($_POST['psubdate']);
            $stdId = $_SESSION['uid'];







            $sq1 = "INSERT INTO projects (title, description, submissionDate, std_ID)  VALUES ('$ptitle','$pdesc','$psubdate', '$stdId')";


            mysqli_close($link);
        }
    }
} else {
    header('location : index.php');
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Project</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Philosopher" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <script src="https://use.fontawesome.com/425f6058af.js"></script>


</head>
<body>
<nav class="navbar navbar-default ">
    <div class="container-fluid wraps">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">E-Review</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home<span class="sr-only">(current)</span></a></li>
                <li><a href="#">Profile</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Manage Projects <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Add Project</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Edit Project</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">View Projects</a></li>


                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Logout</a></li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<h2 class="col-md-4 col-md-offset-4 down">Add Ethics</h2> <br/>
<div>
    <span>Project Title: </span> <?php echo $ptitle; ?>
    <span>Submission Date: </span> <?php echo $psubdate; ?>
</div>

</body>
</html>
