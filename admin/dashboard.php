<?php
    session_start();

   if(empty($_SESSION["username"])){

    header("location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="../assets/bootstrap-4/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="../assets/admin/css/login.css" rel="stylesheet">
</head>
    <body>
        <div id="wrap">
            <div class="container">
                <p>&nbsp;</p>
            <div class="row">
                <div class="col col-4">
                   <h1 class="h1">Dashboard</h1>
                </div>
                <div class="col col-4">
                </div>
                <div class="col col-4 text-right">
                    <form action="function.php" method="POST">
                    <input type="submit" class="btn btn-danger" value="Logout" name="LOGOUT">
                   </form>
                </div>
            </div>
                <p>&nbsp;</p>
                <div class="row text-center">
                    <div class="col col-12">
                        <h2 class="h2">Import Records</h2>
                            <hr>
                    </div>
                    <div class="col col-12">
                        <form class="form-horizontal form" action="function.php" method="post" name="upload_excel" enctype="multipart/form-data">
                            <div class="file btn  btn-primary" style="position: relative; overflow: hidden;">Select file
                                <input type="file" name="file" required  style="position: absolute; font-size: 50px; opacity: 0; right: 0; top: 0;" />
                            </div> &nbsp;
                             &nbsp;<button type="submit" id="submit" name="Import" class="btn btn-success button-loading" data-loading-text="Loading...">Save Records</button>
                        </form>
                    </div>
                    <div class="col col-12">                        
                        <small class="text-danger">Only csv file is allowed</small>
                    </div>
                </div>
            </div>
        </div>

        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/bootstrap-4/js/bootstrap.min.js"></script>
    </body>
</html>
 <!--<div>
    <form class="form-horizontal" action="functions.php" method="post" name="upload_excel" enctype="multipart/form-data">
         <div class="form-group">
             <div class="col-md-4 col-md-offset-4">
                 <input type="submit" name="Export" class="btn btn-success" value="export to excel"/>
             </div>
         </div>
    </form>
 </div>-->