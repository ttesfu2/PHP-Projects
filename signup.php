<?php   
   //require_once('startsession.php');
    $title = "Sign Up";
    require_once('header.php');

            require_once('connectvars.php');
            
            // Connect to the database
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                   or die("Error connecting to DB_NAME server.");

            if (isset($_POST['submit'])) 
            {
                // Grab the profile data from the POST
                $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
                $password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
                $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));

                if (!empty($username) && !empty($password1) && !empty($password2) 
                    && ($password1 == $password2)) 
                { 
                    // Make sure someone isn't already registered using this username
                    $query = "SELECT * FROM nurse_log WHERE username = '$username'";
                    
                    $data = mysqli_query($dbc, $query)
                            or die("Error querying DB_NAME.");
                    
                    if (mysqli_num_rows($data) == 0) 
                    {
                        // The username is unique, so insert the data into the database
                        $query = "INSERT INTO nurse_log (username, password)" .
                                 "VALUES ('$username', SHA('$password1'))";
                                  
                        mysqli_query($dbc, $query)
                        or die("Error querying DB_NAME.");

                        // Confirm success with the user
                        echo '<p>Your new account has been successfully created. You\'re ' .
                             'now ready to <a href="login.php">log in </a>.</p>';

                        mysqli_close($dbc);
                        exit();
                    }
                    else 
                    {
                        // An account already exists for this username, so display an error message
                        echo '<p class="error">An account already exists for this username. ' .
                             ' Please use a different address.</p>';
                        $username = "";
                    }
                }
                else 
                {
                    echo '<p class="error">You must enter all of the sign-up data, ' .
                         'including the desired password twice.</p>';
                }
            }

            mysqli_close($dbc);
        ?>
        <div class="container vh-100">
            <div class="row justify-content-center h-100">
                <div class="card w-25 my-auto shadow">
                    <div class="card-header text-center">
                        <h3>Sigh Up</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="form-group">
                                <input type="text" id="username" class="form-control" name="username" placeholder="Username" 
                                    value="<?php if (!empty($user_username)) echo $user_username; ?>" />
                            </div>
                            <div class="form-group">
                                <input type="password" id="password1" name="password1" placeholder="Password" 
                                    class="form-control"/>
                            </div>
                            <div class="form-group">
                                <input type="password" id="password2" name="password2" placeholder="Confirm" 
                                    class="form-control"/>
                            </div>
                                <input type="submit" name="submit" class="btn btn-info w-100" value="Sign Up"  />
                        </form>
                        
                        <p class="text-left small pt-2"><a href="login.php">Sign in insted</p>
                        
                    </div>
                    <div class="card-footer text-right">
                        <a href="index.php"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-circle"
                             fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" 
                             d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path 
                             fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1
                             0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/></svg>
                            <small>TubeFeed CALC</small>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
