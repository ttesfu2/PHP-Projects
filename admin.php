<?php
    require_once('startsession.php');
    $title = "Admin";
    require_once('header.php');
    require_once('navmenu.php');
    require_once('connectvars.php');
    require_once('PatientInfo.php');
    
    // Make sure the user is loged in
    if (!isset($_SESSION['user_id'])) 
    {
        echo '<p class="login">Please <a href="login.php">log in</a> to access this page.</p>';
        exit();
    }
    
    // Validate if the user loged in as Admin 
    else if ($_SESSION['username'] == "Admin")
    {      
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

        // Retrieve patient data from database order by tube feed date
        $query = "SELECT *  FROM tube_feeding order by id DESC ";
        $data = mysqli_query($dbc, $query);

        // Loop through the array of tube feeding data, formatting it as HTML 
        echo '<table class="table table-secondary  p-3 mt-5 w-auto mx-auto">';
        echo '<thead>';
        echo '<tr>';

        echo '<th scope="col">First Name</th>';
        echo '<th scope="col">Last Name</th>';
        echo '<th scope="col">Total volume</th>';
        echo '<th scope="col">Nurse Name</th>';
        echo '<th scope="col">Feed Date</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
    
        while ($row = mysqli_fetch_array($data)) 
        { 
            // Display the tube feeding date
            echo '<tr>';
            echo '<ht scope="row">';
            echo '<td>' . $row['first_name'] . '</td>';
            echo '<td>' . $row['last_name'] . '</td>';
            echo '<td>' . $row['total_volume'] . '</td>';
            echo '<td>' . $row['nurse_name'] . '</td>';
            echo '<td>' . $row['tube_feed_date'] . '</td>';
            
            // Php delete data with js confirmation
            ?>
                <td><a href="javascript:delete_id(<?php echo $row['id']; ?>)">Remove</a> 
            <?php      
        }
        
        echo '</td></tr>';
        echo '</tbody>';
        echo '</table>';
    }
    else
    {
        // If the login not as Admin redirect the page to login again
        echo '<p>Please <a href="logout.php">Log out</a> and login as Admin to access this page.</p>';
        exit();  
    }
    
    require_once('footer.php');
?>


