<?php
    include ('connection.php');
    if($_SERVER['REQUEST_METHOD']==='POST'){
        if(empty($_POST['firstname']) || empty($_POST['lastname'])||empty($_POST['userid'])||empty($_POST['email'])||empty($_POST['role'])||empty($_POST['password'])||empty($_POST['password1'])){
            echo "Please fill in all required fields";
        }
        if(!($_POST['password']=== $_POST['password1'])){
            echo "Password Mismatch";
        }else{

            echo "Account Created successfully";
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

