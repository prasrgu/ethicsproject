<?php
session_start();
if(isset($_SESSION['ufname'])) {
    if (isset($_SESSION['fformat'])){
        echo $_SESSION['fformat'];
        unset($_SESSION['fformat']);
    }
    if (isset($_SESSION['large'])){
        echo $_SESSION['large'];
        unset($_SESSION['large']);
    }



}

else{
    header ('location : index.php');
}


?>

<?php include('general.php')?>

        <h2 class="col-md-4 col-md-offset-4 down">Add Ethics</h2> <br/>

<form class="form-horizontal" action="upload.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="ptitle" class="col-md-2 col-md-offset-2 control-label">Project Title</label>
        <div class="col-md-4">
            <input type="text" name="ptitle"  class="form-control" placeholder="Project Title"/>
        </div>
    </div>
    <div class="form-group">
        <label for="pdesc" class="col-md-2 col-md-offset-2 control-label">Description</label>
        <div class="col-md-4" >
            <textarea class="form-control"  name="pdesc" placeholder="Please Enter The Description"></textarea>
        </div >
    </div>
    <div class="form-group">
        <label for="subdate" class="col-md-2 col-md-offset-2 control-label" >Submission Date</label>
        <div class="col-md-4">
            <input type="date" name="psubdate"  class="form-control"/>
        </div>

    </div>
    <div class="form-group">
        <label for="etfile" class="col-md-2 col-md-offset-2 control-label">Ethics Document</label>
        <div class="col-md-4">
            <input type="file" name="etdoc" class="form-control"/>
        </div>

    </div>


    <button type="submit" class="btn btn-primary ">Add Project</button>

</form>



</body>
</html>
