<?php
/**
 * Created by PhpStorm.
 * User: 1613112
 * Date: 12/04/2017
 * Time: 09:54
 */

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
        <link rel="stylesheet" href="style.css" >
        <title>Login</title>
    </head>
    
    <body class="wrapper">
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" id="regwrapper">

        <form>
                    <div class="form-group">
                        <input type="text" name="firstname" placeholder="firstname" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="lastname" placeholder="Lastname" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="userid" placeholder="login ID" class="form-control"/>
                    </div>
                    <div class="form-group">
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
                    <div class="form-group">
                        <label for="role">Role</label>

                        <select name="role" class="form-control">
                        <option value="nothing">Please select a role</option>
                        <option value = "STUDENT">Student</option>
                        <option value="EAO">EAO</option>
                        <option value="ADMIN">Admin</option>
                    </select>
                        </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Password" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password1" placeholder="Confirm Password" class="form-control"/>
                    </div>

                    <button type="submit" class="btn btn-primary"> Sign up</button>
                </form>
                </div>
        </div>
        ,</div>
    </body>
    </html>

