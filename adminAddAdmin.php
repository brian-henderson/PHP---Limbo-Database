<!DOCTYPE html>
<html>
    <head>
        <title>Limbo Admin </title>
        <link href="css/main.css" type="text/css" rel="stylesheet"/>
        <link href="css/admin.css" type="text/css" rel="stylesheet"/>
    </head>
    
<body>
    <div id = "header">
        <header> Marist College Limbo</header>
    </div>
    
   <ul>
       <li><a href="limbo-landing.php">Home</a></li>
       <li><a href="lost.php">Lost</a></li>
       <li><a href="found.php">Found</a></li>
       <li><a href="quicklinks.php">Quicklinks</a></li>
       <li style="float:right"><a href="admin.php">Admin Control Panel</a></li>
   </ul>
    
    <div id = "message">
        <div id = "messageT1"> Administrators </div>
        <div id = "messageT2"> Add a New Admin.</div>     
        <br>
    </div>
        
<?php
# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;
require( 'includes/helpers.php' ) ;
require( 'adminShowUsers.php' ) ;

#Adds a new admin from the passed in form
    if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
        $first_name = $_POST['first_name'] ;
        $last_name = $_POST['last_name'] ;
        $email = $_POST['email'] ;
        $pass = $_POST['pass'] ;

	   $queryAddAdmin = 'INSERT INTO users(first_name,last_name, email, pass) 
              VALUES ( "'.$first_name.'"  , "'.$last_name.'", "'.$email.'" , "'.$pass.'")' ;

    $resultsAddAdmin = mysqli_query($dbc,$queryAddAdmin) ;
    check_results($resultsAddAdmin) ;
    }

?>  
<!-- Get inputs from the user. -->
<form action="adminAddAdmin.php" method="POST">
<table align="center">
    <tr>
        <td>First Name:</td><td><input type="text" name="first_name"></td>
    </tr>
    <tr>
        <td>Last Name:</td><td><input type="text" name="last_name"></td>
    </tr>
    <tr>
        <td>Email:</td><td><input type="text" name="email"></td>
    </tr>
    <tr>
        <td>User Password:</td><td><input type="password" name="pass"></td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" id="submitbtn" ></td>
    </tr>
</table>
</form>
</body>
</html>