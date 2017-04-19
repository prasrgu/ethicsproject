<?php






?>
<!DOCTYPE html>
<html>
<head>
             <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Philosopher" rel="stylesheet">
    <link rel="stylesheet" href="style.css" >
</head>
<body class="wrapper">
    <div class="container ">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" id="loginwrapper">
                <h2 class="hfont" align="center"> E-Review</h2>
                <h3 align="center">Log in</h3>

            <form action="verify.php" method="POST">
            <div class="form-group">
                <input type="text" name="username" placeholder ="Username" class="form-control"/>
            </div>

            <div class="form-group">
                <input type="password" name="password" placeholder ="Password" class="form-control"/>
            </div>

            <button type="submit" class="btn btn-primary btn-block"> Log in</button>
        </form>
         </div>
        </div>

        </div>
</body>
</html>

