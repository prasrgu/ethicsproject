<?php
/**
 * Created by PhpStorm.
 * User: AP1
 * Date: 20/04/2017
 * Time: 00:04
 */
session_start();
include('connection.php');


    $fold="../wwwroot/";
    $uid = $_SESSION['uid'];
    $ud = $uid."/";
    $imgFile = $_FILES['etdoc']['name'];
    $tmp_dir = $_FILES['etdoc']['tmp_name'];
    $imgSize = $_FILES['etdoc']['size'];
    $dest =$ud. $imgFile;
    $et = $_POST['etitle'];
    $epto= $_POST['esubdate'];
    $dte = $_POST['esubdate'];

$valid_extensions = array('doc', 'docx', 'pdf');

if (($imgSize < 11048576) && !empty($et) && !empty($epto)){
    move_uploaded_file($tmp_dir, $fold .$ud. $imgFile);
    $imgurl = $fold . $dest;

    $sql = "INSERT INTO ethics VALUES('$et', '$imgurl', '$dte', '$uid')";
    mysqli_query($link, $sql);

    if (mysqli_query($link, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }

    mysqli_close($link);


}