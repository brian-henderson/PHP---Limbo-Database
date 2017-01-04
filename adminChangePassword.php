<!DOCTYPE html>
<html>
    <head>
        <title>Admin Controls </title>
        <link href="css/main.css" type="text/css" rel="stylesheet"/>
        <link href="css/quicklinks.css" type="text/css" rel="stylesheet"/>
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
        <div id = "messageT1" align= "center" > Admin Controls </div>
        <div id = "messageT2" align= "center" > Change Admin Passwords </div>
    </div>
    
    <?php
    # Connect to MySQL server and the database
    require( 'includes/connect_db.php' ) ;
    require( 'includes/helpers.php' ) ;
    require( 'adminShowUsers.php' ) ;
    
    #Updates Admins Profile
    if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
        $user = $_POST['user'] ;
        $newPassword = $_POST['password'] ;
        

	   $query='UPDATE users SET pass = "'.$newPassword.'"  WHERE email = "'.$user.'"' ;

    $results = mysqli_query($dbc,$query) ;
    check_results($results) ;
    }
    
    # Close the connection
	mysqli_close( $dbc ) ;
	
?>  
    
    <form action="adminChangePassword.php" method="POST">
    <table align="center">
        <tr><td>Email/Username</td><td><input type="text" name="user"></td></tr>
        <tr><td>NEW Password:</td><td><input type="password" name="password"></td></tr>
        <tr><td colspan="2"><input type="submit" id="submitbtn" ></td></tr>
    </table>
    </form>   
    
</body>
</html>
