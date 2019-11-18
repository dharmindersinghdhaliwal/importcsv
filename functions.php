<?php

include('includes/config.php');
$con = getdb();

/**Search Books**/
if(isset($_POST['searchBy'])){

  header('Content-Type: application/json');

  $data = [];

  $searchBy =   trim($_POST['searchBy']);
  $text     =   trim($_POST['text']);

  if(empty( $searchBy)){

    $data['success'] = false;
    $data['message'] = '<div class="alert alert-danger">Please select an option from dropdown.</div>';

  }elseif(empty( $text)){

    $data['success'] = false;
    $data['message'] = '<div class="alert alert-danger">Text box cannot be empty.</div>';

  }else{

      if($searchBy=='book_name'){
        $Sql    = "SELECT * FROM `books_record` WHERE `book` LIKE '%$text%' ";
      }
      if($searchBy=='author_name'){
        $Sql    = "SELECT * FROM `books_record` WHERE `author` LIKE '%$text%' ";
      }
      if($searchBy=='topic'){
        $Sql    = "SELECT * FROM `books_record` WHERE `topic` LIKE '%$text%' ";
      }
      
      $result = mysqli_query($con, $Sql);

      if (mysqli_num_rows($result) > 0) {

        while($row=mysqli_fetch_assoc($result)){
          $resultset[] =  $row;
        }

        $data['message']  = '<div class="alert alert-success">Books found for <strong>'. $text. '</strong>.</div>';
        $data['data']     = $resultset;
        $data['success']  = true;

      }else{
        $data['success']  = false;
        $data['message']  = '<div class="alert alert-danger">No record found for <strong>'. $text. '</strong>.</div>';
        $data['data']     = false;

      }

  }
  echo json_encode($data);
  die();

}

function get_all_records(){
  $con = getdb();
  $Sql = "SELECT * FROM books_record";

  $result = mysqli_query($con, $Sql);

  if (mysqli_num_rows($result) > 0) {
    echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>
         <thead><tr><th>Sr No</th>
                   <th>Book Name</th>
                   <th>Author Name</th>
                   <th>Book Topic</th>
                   <th>Book Download URL</th>
                   <th>Book Image URL</th>
                   <th>Record Created Date</th>
                   </tr></thead><tbody>";
    while($row = mysqli_fetch_assoc($result)) {
      echo "<tr><td>" . $row['ID']."</td>
               <td>"  . $row['book']."</td>
                <td>" . $row['author']."</td>
                <td>" . $row['topic']."</td>
                <td>" . $row['download_url']."</td>
                <td>" . $row['image_url']."</td>
                <td>". $row['created_at']."</td></tr>";
     }
     echo "</tbody></table></div>";
     
  } else {
     echo "No record found";
  }
}