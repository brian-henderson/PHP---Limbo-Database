<!-- 
Author: Brian Henderson and Kevin Kleinschmidt
Updated: 11.11.2016
-->

<!DOCTYPE html>
<html>
    <head>
        <title> Marist College Limbo </title>
        <link href="css/main.css" type="text/css" rel="stylesheet"/>
        <link href="css/limbo-landing.css" type="text/css" rel="stylesheet"/>
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
        <div id = "messageT1" align= "center" > Welcome to Limbo! </div>
        <div id = "messageT2" align= "center" > If you lost or found something, you're in luck! This is the place to be!</div>
        <div id = "messageT2" align= "center" > Select an option from the menu bar above!</div>
    </div>
	
	<?php
	# Connect to MySQL server and the database
	require( 'includes/connect_db.php' ) ;
	
	# Create a qury to get the name and price sorted by price
	$query = 'SELECT id, item_name, create_date FROM stuff WHERE create_date <="2016-11-01 00:00:00" ORDER BY create_date ASC' ;

	# Execute the query
	$results = mysqli_query( $dbc, $query ) ;

	# Show results
	if ( $results )
	{
		echo '<H1 align="center">Some of the Recently Lost and Found Items</H1>';
		echo '<TABLE align="center" width=50% cellpadding=5px cellspacing=5px border = "1">';
		echo '<TR>';
		echo '<TH>ID</TH>' ;
		echo '<TH>Item Name</TH>';
		echo '<TH>Created</TH>';
		echo '</TR>';
		
		# For each row result, generate a table row
		while ( $row = mysqli_fetch_array( $results, MYSQLI_ASSOC ) )
		{
		 echo '<TR>' ;
		 echo '<TD>' . $row['id'] . '</TD>' ;
		 $alink = '<A HREF="quicklinks.php"' . $row['item_name'] . '>' . $row['item_name'] . '</A>' ;
		 echo '<TD align="right">' . $alink . '</TD>' ; 
		 echo '<TD align="right">' . $row['create_date'] . '</TD>' ;
		 echo '</TR>' ;
		}
		
		# End the table
		echo '</TABLE>';
		
		# Free up the results in memory
		mysqli_free_result( $results ) ;
	}
	else
	{
		# If we get here, something has gone wrong
		echo '<p>' . mysqli_error( $dbc ) . '</p>' ;
	}
	
	# Close the connection
	mysqli_close( $dbc ) ;
	?>
	
	<footer> 
		<p align="center"> We hope you found what you needed! </p>
	</footer>	

	</body>
</html>