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
        <div id = "messageT2"> Delete an Admin from the Admin Username.</div>
        <br>
    </div>
    
    <?php
    require ( 'includes/connect_db.php' ) ;
    require ( 'includes/helpers.php' ) ;
    require( 'adminShowUsers.php' ) ;
    
    #Deletes an Admin from the passed in form
    if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
        
        $emailDelete = $_POST['delAdmin'] ;
        
	    $queryDeleteAdmin = 'DELETE FROM users WHERE email = "'.$emailDelete.'"';

        $resultsDeleteAdmin = mysqli_query($dbc,$queryDeleteAdmin) ;
        check_results($resultsDeleteAdmin) ;
    }
    ?>
    
    <form action="adminDeleteAdmin.php" method="POST" >
    <table align="center">
        <tr> 
            <td width="20">Email:</td>
            <td><input type="text" id="delAdmin" name="delAdmin"></td>
            <td></td>
            <td colspan="2"><input id = "submitbtn" type = "submit" value="Submit"></td>
        </tr>
        
    </table>
    
</body>
</html>