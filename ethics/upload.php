<?php
/**
 * Created by PhpStorm.
 * User: AP1
 */
session_start();
include('connection.php');
if (isset($_SESSION['ufname'])) {
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (substr($_SESSION['uid'], 0, 1) === 'S') {
            $fold = "../wwwroot/";
            $uid = $_SESSION['uid'];
            $ud = $uid . "/";
            echo print_r($_FILES['etdoc']);
            $imgFile = $_FILES['etdoc']['name'];
            $tmp_dir = $_FILES['etdoc']['tmp_name'];
            $imgSize = $_FILES['etdoc']['size'];

            $et = $_POST['ptitle'];
            $epto = $_POST['psubdate'];
            $dest = $ud . $et;
            $desc = $_POST['pdesc'];
            $dte = $_POST['psubdate'];


            if (($imgSize < 1048576) && !empty($et) && !empty($epto)) {
                $ext = substr(strrchr($imgFile, "."), 1);

                echo $ext;


             if (($ext=="doc")||($ext=="docx")||($ext=="pdf")) {
                    move_uploaded_file($tmp_dir, $fold . $dest);
                    $imgurl = $fold . $dest;

                    $sql = "INSERT INTO ethics(title, url_location, submissionDate, student_ID) VALUES('$et', '$imgurl', '$dte', '$uid')";
                    mysqli_query($link, $sql);
                    $sqt = "SELECT * FROM ethics WHERE student_ID='$uid' AND url_location='$imgurl'";
                    $rowsss= mysqli_query($link, $sqt);
                   $val= mysqli_fetch_assoc($rowsss);
                   $var=$val['id'];

                 $sq2 = "INSERT INTO projects (title, description, submissionDate, std_ID, ethics_form_ID)  VALUES ('$et', '$desc', '$dte', '$uid','$var')";
                 mysqli_query($link, $sq2);


                    mysqli_close($link);
                    header('location: projlist.php');

                }else {
                    $_SESSION['fformat'] = "Invalid File Format";
                    header('location: pjform.php');
                }

            }else {
                $_SESSION['large'] = "File too Large";
                header('location: pjform.php');
            }

        }
    }elseif($_SERVER['REQUEST_METHOD'] === 'GET'){
        if (substr($_SESSION['uid'], 0, 1) == 'E') {

        }
        if (substr($_SESSION['uid'], 0, 1) == 'A') {

        }
        else{
            include ('unauthorized.php');
        }

    }
}
else{
    header('location:index.php');
}