<?php
    include ('connection.php');
    if($_SERVER['REQUEST_METHOD']==='POST'){
        if(empty($_POST['firstname']) || empty($_POST['lastname'])||empty($_POST['userid'])||empty($_POST['email'])||($_POST['role'] =='nothing')||empty($_POST['password'])||empty($_POST['password1'])){
            echo "Please fill in all required fields";
        }

        elseif(!($_POST['password']=== $_POST['password1'])){
            echo "Password Mismatch";
        }else{

            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $userid = $_POST['userid'];
            $email=$_POST['email'];
            $adres= "";
            if(!empty($_POST['address'])){
                $adres = $_POST['address']." ";
                if(!empty($_POST['address2'])){
                    $adres =$adres. $_POST['address2']." ";
                    if(!empty($_POST['address3'])){
                        $adres = $adres.$_POST['address3']." ";
                    }
                }
            }
            $role = $_POST['role'];
            $password  =password_hash($_POST['password'], PASSWORD_DEFAULT);
            if($role=="STUDENT"){
                $query1="INSERT INTO student VALUES ('{$firstname}', '{$lastname}', '{$userid}', '{$password}', '{$email}', '{$adres}')";
                echo "I just prepared an insert statement";
                mysqli_query($link, $query1);
                echo "I just inserted the value into student";
            }

            if($role !="STUDENT"){
                $query1="INSERT INTO staff VALUES ('{$userid}','{$role}','{$firstname}', '{$lastname}', '{$password}', '{$email}', '{$adres}')";

               // mysqli_query($link, $query1);
                if (mysqli_query($link, $query1)) {
                    echo "New record created successfully";
                        } else {
                    echo "Error: " . $query1 . "<br>" . mysqli_error($link);
                        }

                mysqli_close($link);

            }

            //header('location: index.php');

        }
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
        <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Philosopher" rel="stylesheet">
        <link rel="stylesheet" href="style.css" >
        <title>Login</title>
    </head>
    
    <body class="wrapper">
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" id="regwrapper">
                <h2 class="hfont" align="center"> E-Review</h2>
                <h3 align="center">Register</h3>
        <form method="POST" action="register.php">
                    <p align="center">All fields marked with (*) are mandatory</p>
                    <div class="form-group"><span class="text-danger">*</span>
                        <input type="text" name="firstname" placeholder="firstname" class="form-control"/>
                    </div>
                    <div class="form-group"><span class="text-danger">*</span>
                        <input type="text" name="lastname" placeholder="Lastname" class="form-control"/>
                    </div>
                    <div class="form-group"><span class="text-danger">*</span>
                        <input type="text" name="userid" placeholder="login ID" class="form-control"/>
                    </div>
                    <div class="form-group"><span class="text-danger">*</span>
                        <input type="text" name="email" placeholder="Email" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="address" placeholder="Address Line 1" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="address2" placeholder="Address Line 2" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="address3" placeholder="Address Line 3" class="form-control"/>
                    </div>
                    <div class="form-group"><span class="text-danger">*</span>
                        <label for="role">Role</label>
                        <select name="role" class="form-control">
                        <option value="nothing">Please select a role</option>
                        <option value = "STUDENT">Student</option>
                        <option value="EAO">EAO</option>
                        <option value="ADMIN">Admin</option>
                    </select>
                        </div>
                    <div class="form-group"><span class="text-danger">*</span>
                        <input type="password" name="password" placeholder="Password" class="form-control"/>
                    </div>
                    <div class="form-group"><span class="text-danger">*</span>
                        <input type="password" name="password1" placeholder="Confirm Password" class="form-control"/>
                    </div>

                    <button type="submit" class="btn btn-primary"> Sign up</button>
                </form>
                </div>
        </div>
        </div>
    </body>
    </html>

