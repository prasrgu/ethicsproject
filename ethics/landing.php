<?php
/**
 * Created by PhpStorm.
 * User: 1613112
 * Date: 12/04/2017
 * Time: 16:06
 */
    session_start();
if(isset($_SESSION['ufname'])) {



}
    
    else{
        header ('location : index.php');
    }


?>



<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
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
    <nav class="navbar navbar-default ">
        <div class="container-fluid wraps">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Manage Projects <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">New Ethics</a></li>
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

    <h2> <? echo "Welcome ".$_SESSION['ufname']; ?></h2>

    <div class="container" >
        <div class="row">
            <div class = "col-md-4 col-md-offset-4 space">
                <span class="cent"> <a href="pjform.php"><i class="fa fa-plus fa-5x"  aria-hidden="true"></i>New Ethics </a></span>
                <span class="cent"><a> <i class="fa fa-pencil-square-o fa-5x" aria-hidden="true"></i>Edit Project</a></span>


            </div>
            <div class = "col-md-4 col-md-offset-4 space">
                <span class="cent"> <a href="projlist.php"><i class="fa fa-list fa-5x" aria-hidden="true" ></i>View Projects </a></span>
                <span class="cent"><a> <i class="fa fa-wrench fa-5x" aria-hidden="true"></i>Edit Profile</a></span>


            </div>
        </div>
    </div>

    </body>






</html>