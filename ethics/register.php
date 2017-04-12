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
        <title>Login</title>
    </head>
    <body>
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


    </body>
    </html>

