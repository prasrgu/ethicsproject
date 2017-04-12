<?php
/**
 * Created by PhpStorm.
 * User: 1613112
 * Date: 12/04/2017
 * Time: 17:57
 */
include('connection.php');
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $pword = $_POST['password'];
        $query2= "SELECT * FROM student WHERE student_ID ='$username' ";
        $query3 ="SELECT * FROM staff WHERE staff_ID ='$username' ";
        $result1=  mysqli_query($link, $query2);
        $result2=  mysqli_query($link, $query3);
        $row = "";

        if(mysqli_num_rows($result1)==1 ) {
            $row = mysqli_fetch_assoc($result1);
        }
        else if(mysqli_num_rows($result2)==1){
            $row = mysqli_fetch_assoc($result2);
        }
        else{
            header('location: index.php');
                
        }
        $hash = $row['password'];
        if(password_verify($pword, $hash)) {
            session_start();


            $_SESSION['ufname'] = $row['firstname'];
            $_SESSION['ulname'] = $row['lastname'];
            $_SESSION['uemail'] = $row['email'];

            header('location: landing.php');
        }
        else{
            echo "Incorrect Password";
            header('location: index.php');
        }
    }
    else{
        echo "Invalid Login Please Try Again";
        header('location: index.php');
    }




}