<?php
    // Start the session
    require_once('startsession.php');
    require_once('connectvars.php');
    
    // Set the selected row will be deleted usting the following condition
    if(isset($_GET['delete_id']))
    {
        // Connect to the database
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
               or die("Error connection DB_NAME sserver.");

        $sql = "DELETE FROM tube_feeding WHERE id=".$_GET['delete_id'];

        mysqli_query($dbc, $sql)
            or die("Error querying DB_NANE.");

        header("Location: admin.php");
        
        mysqli_close($dbc);
    }
?> 
  
