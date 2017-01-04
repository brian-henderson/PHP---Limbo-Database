<!DOCTYPE html>
<html>
    <head>
        <title>Limbo Quicklinks </title>
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
       <li style="float:right"><a href="adminLogin.php">Admin</a></li>
   </ul>
    
    <div id = "message">
        <div id = "messageT1" align= "center" > Quicklinks </div>
        <div id = "messageT2" align= "center" > Select an item to receive more detail</div>
    </div>
    
<?php
# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

require( 'includes/helpers.php' ) ;
	
	
	show_link_records($dbc);
	
	# Close the connection
	mysqli_close( $dbc ) ;

?>
</body>
</html>