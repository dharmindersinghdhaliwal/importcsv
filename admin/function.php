<?php

session_start();

include('../includes/config.php');
$con = getdb();

if(isset($_POST['Login'])){

	$username 	= trim($_POST['username']);
    $password 	= trim($_POST['password']);

	if (!empty($username) && !empty($password)){

		$query = "SELECT * FROM users WHERE email = '$username' AND password = '$password'";
		$result = mysqli_query($con, $query);

		if (mysqli_num_rows($result) > 0) {

			$_SESSION['username'] = $username;
			header("Location: dashboard.php");
			die();
			
	  	}else{
	  		$_SESSION['error'] = '<div class="alert alert-danger">Invalid username or password.</div>';
	  			header("Location: index.php");
	  		die();
	  	}

	}
  	
}
/**Save Records **/
if(isset($_POST["Import"])){

  $filename = $_FILES["file"]["tmp_name"];

  if($_FILES["file"]["size"] > 0){

    $file = fopen($filename, "r");
    
    while (($getData = fgetcsv($file, 10000, ",")) !== FALSE){

      $book         = isset($getData[1])? $getData[1]: '';
      $author       = isset($getData[2])? $getData[2]: '';
      $topic        = isset($getData[3])? $getData[3]: '';
      $download_url = isset($getData[4])? $getData[4]: '';
      $image_url    = isset($getData[5])? $getData[5]: '';

      $sql    = "INSERT into books_record (book,author,topic,download_url,image_url)
              values ('".$book."','".$author."','".$topic."','".$download_url."','".$image_url."')";
      $result = mysqli_query($con, $sql);

      if(!isset($result)){
        echo "<script type=\"text/javascript\">
              alert(\"Invalid File:Please Upload CSV File.\");
              window.location = \"dashboard.php\"
              </script>";
        }
        else {
            echo "<script type=\"text/javascript\">
            alert(\"CSV File has been successfully Imported.\");
            window.location = \"dashboard.php\"
          </script>";
        }
      }
      
      fclose($file);

    }
}

/**Export records in a CSV file**/
if(isset($_POST["Export"])){

  header('Content-Type: text/csv; charset=utf-8');
  header('Content-Disposition: attachment; filename=data.csv');

  $output = fopen("php://output", "w");
  fputcsv($output, array('ID', 'Book Name', 'Author Name', 'Book Topic', 'Book Download URL','Book Image URL','Add Date'));

  $query = "SELECT * from books_record ORDER BY ID DESC";

  $result = mysqli_query($con, $query);

  while($row = mysqli_fetch_assoc($result)){
    fputcsv($output, $row);
  }
  fclose($output);
}


/**lOGOUT**/
if(isset($_POST['LOGOUT'])){

    session_start();

    session_destroy();  

    header("Location: index.php");

    die();
}