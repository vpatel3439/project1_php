<html>

<head>
     <title>Project 1 - Vesha Patel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href ="css/style.css">
</head>

<body>
     <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">MyBookStore</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="index.html">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="bookstore.php">BookStore</a>
                </div>
            </div>
        </nav>
    </div>
</body>

</html>

<?php
   require('mysqli_connect.php');

    $book_query= 'select * from BookInventory';

//prepare the statement
$rows=array();
$display = $mysqli->query($book_query); 
 
if ($display->num_rows > 0) {
  
  while($row = $display->fetch_array()) {
    echo "<br><center>
    <div class='col-md-4' style='float:left;'>&nbsp;</div>
    <div class='col-md-4' style='float:left;'>
       <a href='?bookid=".$row['BookInventory_Id']."' style='color:#28abb9; font-size:20px;'>Book name: " .$row['Book_Name']."</a>
    </div>
    <div class='col-md-3' style='float:right;'>&nbsp;</div>
    <div class='clearfix'></div>
    </center>";
      
  }
} else {
  echo "no results";
}

if(!(empty($_GET['bookid'])))
{
    session_start();
    $_SESSION['bookid']=$_GET['bookid'];
    header("Location: checkout.php");
}


?>
