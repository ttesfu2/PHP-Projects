<?php
    $title = "Log In";
    require_once('header.php');
    require_once('connectvars.php');
    
    // Start the session
    session_start();
    
    // Clear the error message
    $error_msg = "";
    
    // If the user isn't logged in, try to log them in
    if (!isset($_SESSION['user_id']))
    {
        if (isset($_POST['submit']))
        {
            // Connect to the database
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or die("Error connecting to DB_NAME server.");
            
            // Grab the user-entered log-in data
                $user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
                $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
                $type = mysqli_real_escape_string($dbc, trim($_POST['type']));
            
            if (!empty($user_username) && !empty($user_password))
            {   
                // Look up the username and password in the database
                $query = "SELECT user_id, username FROM nurse_log WHERE username = '$user_username' 
                            AND password = SHA('$user_password') AND type = '$type'";
                 
                $data = mysqli_query($dbc, $query)
                        or die("Error querying DB_NAME.");

                if (mysqli_num_rows($data) == 1) 
                {
                    // The log-in is OK so set the user ID and username cookies, and redirect to the home page 
                    $row = mysqli_fetch_array($data);
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['username'] = $row['username'];
                    
                    setcookie('user_id', $row['user_id'], time() + (60 * 60 * 24 * 30)); // expires in 30 days
                    setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30)); // expires in 30 days
                    $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']).'/index.php';
                    header('Location: ' . $home_url);
                }
                else 
                {
                    // The username/password/type are incorrect so set an error massage
                    $error_msg = 'Sorry, you must enter a valid username, password and type to log in.';
                }
            }
            else
            {
                // The username/password weren't entered so set an error message
                $error_msg = 'Sorry, you must enter your username and password to log in.';
            }
        }
    }

    // If the cookie is empty, show any error message and the log-in form; 
    //otherwise confirm the log-in
    if (empty($_COOKIE['user_id']))
    {
        echo '<p class="error">' . $error_msg . '</p>';
        ?>
             <div class="container vh-100">
                <div class="row justify-content-center h-100">
                    <div class="card w-25 my-auto shadow">
                        <div class="card-header text-center">
                            <h3>Log in</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <div class="form-group">
                                    <select class="form-control" id="type"  name="type">
                                    <option selected>Select User Type</option>
                                    <option value="admin" <?php if (!empty($type) && $type == 'admin') 
                                        echo 'selected = "selected"'; ?>>Admin</option>
                                    <option value="user" <?php if (!empty($type) && $type == 'user') 
                                        echo 'selected = "selected"'; ?>>User</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="username" class="form-control" name="username"
                                         placeholder="Username" value="<?php if (!empty($user_username)) 
                                         echo $user_username; ?>" />
                                </div>
                                <div class="form-group">
                                    <input type="password" id="password" class="form-control"
                                           name="password" placeholder="Password" /> 
                                </div>
                                
                                <input type="submit" name="submit" class="btn btn-info w-100" value="Log In"  />
                            </form>
                            <p class="text-left small pt-2"><a href="signup.php">Sign Up</p><br/>
                        </div>
                        <div class="card-footer text-right">
                            <a href="index.php"><svg width="1em" height="1em" viewBox="0 0 16 16" 
                                 class="bi bi-arrow-left-circle"
                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" 
                                 d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path 
                                 fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.
                                 708l-3-3a.5.5 0 0 10-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/></svg>
                                <small>TubeFeed CALC</small>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
     
            <?php
            } 
            else 
            {
                // Confirm the successful log-in
                echo('<p class="login">You are logged in as ' . $_SESSION['username'] . '.</p>');
            }
        ?>
    </body>
</html>
