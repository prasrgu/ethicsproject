<?php
/**
 * Created by PhpStorm.
 * User: AP1
 * Date: 20/04/2017
 * Time: 17:36
 */

include('connection.php');
$proj_ID=$_GET['p'];
$std_ID = $_GET['sid'];
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
            <h2>Assign Experimental Approval Officer (EAO)</h2>
        <?php
                $s = "SELECT projID, count(*) AS c FROM staff_proj GROUP  BY projID";

                    $ede=mysqli_query($link, $s);
                    while($resor = mysqli_fetch_assoc($ede)){
                        if($resor['c']==1){

                        }
                    }
               $sst = "SELECT * FROM projects WHERE id= '$proj_ID'";
              $sedde= mysqli_query($link, $sst);

                $deta=mysqli_fetch_assoc($sedde);
                echo "<h3>". "Project Title:  ".$deta['title']."</h3>";
                echo "<h3>"."Description: ".$deta['description']."</h3>";
                echo "<h3>"."Submission Date: ".$deta['submissionDate']."</h3>";
        ?>
            <form method="get" action="eaoass.php" class="form-horizontal col-md-5 col-md-offset-4">
                <label for="eao">Select EAO
                <select name="eao"  id="mul" class="form-control" multiple>
                   <?php $sdsf= "SELECT firstname, lastname,staff_ID FROM staff WHERE role = 'EAO'";
                            $mines=mysqli_query($link, $sdsf);
                            if(mysqli_num_rows($mines)>0){
                                while($restless=mysqli_fetch_assoc($mines)){
                                        echo "<option value='{$restless['staff_ID']}'>".$restless['firstname']. "  ".$restless['lastname']."</option>";
                                }
                            }
                   ?>
                </select>
                </label>
            <button type="submit" class="btn btn-primary">Assign</button>

            </form>






</body>
</html>