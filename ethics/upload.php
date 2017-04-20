<?php
/**
 * Created by PhpStorm.
 * User: AP1
 * Date: 20/04/2017
 * Time: 00:04
 */
session_start();
include('connection.php');
if (isset($_SESSION['ufname'])) {
    if (substr($_SESSION['uid'], 0, 1) == 'S' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $fold = "../wwwroot/";
        $uid = $_SESSION['uid'];
        $ud = $uid . "/";
        echo print_r($_FILES['etdoc']);
        $imgFile = $_FILES['etdoc']['name'];
        $tmp_dir = $_FILES['etdoc']['tmp_name'];
        $imgSize = $_FILES['etdoc']['size'];

        $et = $_POST['etitle'];
        $epto = $_POST['esubdate'];
        $dest = $ud . $et;
        $dte = $_POST['esubdate'];

        $valid_extensions = array('doc', 'docx', 'pdf');

        if (($imgSize < 1048576) && !empty($et) && !empty($epto)) {
            $ext = substr(strrchr($imgFile, "."), 1);
            print_r(strcmp($ext, "doc"));
           // if (strcmp($ext, "doc")!=0 && strcmp($ext, "docx") !=0 && strcmp($ext, "pdf")!=0 ) {
                move_uploaded_file($tmp_dir, $fold . $dest);
                $imgurl = $fold . $dest;

                $sql = "INSERT INTO ethics(title, url_location, submissionDate, student_ID) VALUES('$et', '$imgurl', '$dte', '$uid')";
                mysqli_query($link, $sql);

                if (mysqli_query($link, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($link);
                }

                mysqli_close($link);

            } else {
                $_SESSION['fformat'] = "Invalid File Format";
                header('location: addethics.php');
            }
        } else {
            $_SESSION['large'] = "File too Large";
            header('location: addethics.php');
        }
    } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {

            header('location: landing.php');
    }
    if (substr($_SESSION['uid'], 0, 1) == 'E' ){

    }
    if (substr($_SESSION['uid'], 0, 1) == 'A') {

   // }
} else{
    header('location:index.php');
}
