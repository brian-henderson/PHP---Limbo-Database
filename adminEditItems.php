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
        <div id = "messageT2" align= "center" > Delete and Update Item Status Here using the Item IDs </div>
    </div>
    
    <?php
    # Connect to MySQL server and the database
    require( 'includes/connect_db.php' ) ;
    require( 'includes/helpers.php' ) ;
	
    show_link_records($dbc);
	
    #Change Item Status by the passed in Item ID number
    if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
	   $Status = $_POST['Status'];
	   $StatusID = $_POST['statusID'];
	
	   $queryStatus = 'UPDATE stuff SET status = "'.$Status.'" WHERE id = "'.$StatusID.'"';
	
       $resultStatus = mysqli_query($dbc, $queryStatus);
	   check_results($resultStatus);
    }
    
    #Delete Item by the passed in Item ID number
    if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
	   $deleteID = $_POST['deleteID'];
       
       $queryDelete = 'DELETE FROM stuff WHERE id = "'.$deleteID.'" ';
       
       $resultDelete = mysqli_query($dbc, $queryDelete);
       check_results($resultDelete);
    }
    
	# Close the connection
	mysqli_close( $dbc ) ;
?>  
    
    <form action="adminEditItems.php" method="POST" >
    <table align="center">
        <tr>
            <td width="180">Delete an Item</td>
            <td width="20">ID:</td>
            <td width="80"><input type="text" id="submitDel" name="deleteID" maxlength="5" size="3"></td>
            <td></td>
            <td colspan="2"><input id = "submitbtn" type = "submit" value="Submit"></td>
        </tr>
        <tr>
            <td>Change Item Status</td>
            <td>ID:</td>
            <td><input type="text" id="submitStat" name="statusID"></td>
            <td width="100"><select name = "Status">
                     <option value="Lost">Lost</option>
                     <option value="Found">Found</option>
            </select></td>
            <td colspan="2"><input id = "submitbtn" type = "submit" value="Submit"></td>
        </tr>
    </table>
    </form>
    

</body>
</html>