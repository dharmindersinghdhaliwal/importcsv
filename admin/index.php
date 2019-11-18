<!DOCTYPE html>
<html lang="en">
<head>
<link href="../assets/bootstrap-4/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="../assets/admin/css/login.css" rel="stylesheet" id="bootstrap-css">
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/bootstrap-4/js/bootstrap.min.js"></script>

<!------ Include the above in your HEAD tag ---------->
<?php 

session_start();
// Check if the user is already logged in, if yes then redirect him to dashbaord page
if(isset($_SESSION["username"]) && !empty($_SESSION["username"])){
    header("location: dashboard.php");
    exit;
}

?>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <p>&nbsp;</p>
    <!-- Icon -->
    <div class="fadeIn first">
      <img src="../assets/imgs/login-icon.png" style="width: 20%" class="img-rounded" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form action="function.php" method="POST"> 
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="login" required>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required>
      <input type="submit"  name="Login" class="fadeIn fourth" value="Log In">
       <?php
      if(isset($_SESSION["error"]) && !empty($_SESSION["error"])){
        echo $_SESSION['error'];
      }
      ?>
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>
</body>
</html>
<script type="text/javascript">

  setTimeout(function(){
    jQuery('.alert').fadeOut();
  }, 3000);

</script>