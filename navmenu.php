<?php
    require_once('startsession.php');
?>
<body>
    <div class="container-fluid bg-white text-body">
        <header class="row jumbotron bg-info text-white m-0 px-3">
            <h1 class="mx-auto">Tube Feeding Calculator</h1>
        </header>
        
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark" role="navigation">
            <a class="navbar-brand" href="#">TubeFeed@CALC</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" 
                aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only"></span></a>
                    </li>
                    
                    <?php
                    // Make sure the user is logged in before going any further.
                    if (isset($_SESSION['username'])) 
                    {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="AddPatientInfo.php">Patient Parameters</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="View.php"  aria-disabled="true">Review</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin.php"  aria-disabled="true">Admin</a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <ul class="navbar-nav ml-auto">
                
                <?php
                // User logout
                if (isset($_SESSION['username'])) 
                {
                ?>
                    <li class="nav-item">
                        <a class="text-white" href="logout.php" aria-disabled="true"><?php echo $_SESSION['username'] ; ?>
                             Logout</a>
                    </li>
                <?php
                } 
                else 
                {
                ?>
                    <li class="nav-item ">
                        <a class="nav-link" href="signup.php">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-check-fill" 
                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                             <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0
                             6zm9.854-2.854a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5
                             7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                        </svg> Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php" tabindex="-1"  aria-disabled="true">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-box-arrow-in-right" 
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0
                                1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5
                                2h-8A1.5 1.50 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                            <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 
                            7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                        </svg> Login </a>
                    </li>
                <?php
                    }
                ?>
                </ul>
            </div>
        </nav>
     


