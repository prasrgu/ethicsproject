<?php
/**
 * Created by PhpStorm.
 * User: 1613112
 * Date: 12/04/2017
 * Time: 09:54
 */

?>
<!DOCTYPE html>

    <head>
        <title>Login</title>
    </head>
    <body>
                <form>
                    <input type="text" name="firstname" placeholder="firstname"/>
                    <input type="text" name="lastname" placeholder="lastname"/>
                    <input type="text" name="userid" placeholder="login ID"/>
                    <input type="email" name="email" placeholder="Email"/>
                    <input type="text" name="address" placeholder="Address Line 1"/>
                    <input type="text" name="address" placeholder="Address Line 2"/>
                    <input type="text" name="address" placeholder="Address Line 3"/>
                    <select name="role">
                        <option value="nothing">Please select a role</option>
                        <option value = "STUDENT">Student</option>
                        <option value="EAO">EAO</option>
                        <option value="ADMIN">Admin</option>
                    </select>
                    <input type="password" name="password" placeholder="Password"/>
                    <button> Log in</button>
                </form>


    </body>
    </html>

