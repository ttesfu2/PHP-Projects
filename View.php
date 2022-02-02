<?php
    require_once('startsession.php');
    $title = "View Patient Info";
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
    
    // Retrieve patient data from database order by first and last name and sum all the total volume entered      
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
           or die("Error connection DB_NAME sserver.");

    $query = "SELECT first_name, last_name, SUM(total_volume)as sub_total FROM tube_feeding GROUP BY first_name,last_name";
    
     $result = mysqli_query($dbc, $query);

    // Loop through the array of tube feeding data, formatting it as HTML 
    echo '<table class="table table-secondary  p-3 mt-5 w-auto mx-auto">';
    echo '<thead>';
    echo '<tr>';

    echo '<th scope="col">First Name</th>';
    echo '<th scope="col">Last Name</th>';
    echo '<th scope="col">Subtotal volume</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
                
    while ($row = mysqli_fetch_array($result))
    {
        // Display the tube feeding date
        echo '<tr>';
        echo '<ht scope="row">';
        echo '<td>' . $row['first_name'] . '</td>';
        echo '<td>' . $row['last_name'] . '</td>';
        echo '<td>' . $row['sub_total'] . '</td>';
   }
    echo '</td></tr>';
    echo '</tbody>';
    echo '</table>';

    mysqli_close($dbc);     

    require_once('footer.php');
?>
