
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
    <div><br></div>
    
    <br>
    
    <div class="col-md-4" style="float:left;">&nbsp;</div>
    <div class="form-container">
        <div class="bg-img">
            
        <form action="checkout.php" method="POST" class="container" >
            <center>
        <h3>Check Out</h3>
         </center>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="First Name" name="Firstname" required />
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Last Name" name="Lastname" required />
            </div>
            
            <center>
                <div class="form-group form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="payment_option" id="inlineRadio1" value="Credit">
                    <label class="form-check-label" for="inlineRadio1">Credit Card</label>
                </div>
                <br>
               <div class="form-group form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="payment_option" id="inlineRadio2" value="Debit">
                    <label class="form-check-label" for="inlineRadio2">Debit Card</label>
                </div>
                   <br>
                
                <div class="form-group form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="payment_option" id="inlineRadio3" value="Cash">
                    <label class="form-check-label" for="inlineRadio3">Cash</label>
                </div>
                   
               
            </center>
             
            <div class="form-group">
                <center>
                    <input type="submit" name="submit" class="btn btn-dark" value="Check Out" />
                </center>
            </div>

        </form>
    </div>
    </div>
    <div class="col-md-4" style="text-align:center">&nbsp;</div>
    <div class="col-md-4" style="text-align:center">&nbsp;</div>
 

    
</body>

</html>
<?php
   require('mysqli_connect.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if(empty($_POST['Firstname']) || empty($_POST['Lastname'] || empty($_POST['payment_option'])))
    {
        echo "<h3>Please enter value in all fields.</h3>" ;  
    }
    else
    {
       $santized_fname = $mysqli->real_escape_string(trim($_POST['Firstname']));
        $santized_lname = $mysqli->real_escape_string(trim($_POST['Lastname']));
        $santized_payment = $mysqli->real_escape_string(trim($_POST['payment_option']));
        $quantity=1;
        $bookid=$_SESSION['bookid'];
        $sql_insert = "insert into bookinventoryorder(Firstname,Lastname,payment_option,quantity,BookInventory_Id) values(?,?,?,?,?)";
        
        $statement = $mysqli->prepare($sql_insert);
        $statement->bind_param('sssii',$santized_fname,$santized_lname,$santized_payment,$quantity,$bookid);
        $statement->execute();
        
        if ($statement->affected_rows ==1){
            echo "<center><h4>Order successfully placed.</h4></center>";
        }
        else{
            echo "<div class='container'><h4>OrderFailed.</h4></div>";
        }
        
        $sql_update="update bookinventory set quantity = (quantity -1) where BookInventory_Id=?";
        $statement1 = $mysqli->prepare($sql_update);
        $statement1->bind_param('i',$bookid);
        $statement1->execute();
        if ($statement->affected_rows ==1){
            echo "<center><h4>Quantity Updated</h4></center>";
        }
        else{
            echo "<h4>Quantity update fail</h4>";
        }        
    }
}
    
   
?>