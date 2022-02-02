<?php   
    require_once('startsession.php');
    $title = "Patient Info";
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
    
    // Initialize
    $total_volume = 0;

    // Create new instance object from PatientInfor class              
    $patientData = new PatientInfo();
    $patientData->setTotal_volume($total_volume); 
    
    if (isset($_POST['submit'])) 
    {
        if (!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['startdate']) 
            && !empty($_POST['gender']) && !empty($_POST['dr_order']) && !empty($_POST['jevity']))
        {
            if (is_numeric($_POST['dr_order']) && is_numeric($_POST['jevity']))
            {   
                // Grab the score data from the POST and use the object
                $patientData->setFirst_name($_POST['firstname']);
                $patientData->setLast_name($_POST['lastname']);
                $patientData->setStartdate($_POST['startdate']);
                $patientData->setGender($_POST['gender']);
                $patientData->setDr_order($_POST['dr_order']);
                $patientData->setJevity($_POST['jevity']);
                $patientData->setNurse_name($_POST['nurse_name']);

                $patientData->getFirst_name();
                $patientData->getLast_name();
                $patientData->getStartdate();
                $patientData->getGender();
                $patientData->getDr_order();
                $patientData->getJevity();
                $patientData->getNurse_name();

                $patientData->totalTubeFeeding();
                $patientData->insertPatientInfo();
                              
                // Display the claculeted abount of formula, jevity with ml
                ?>
                <blockquote class="blockquote bg-info text-white mt-3 p-3">
                    <p class="mb-0 font-weight-bold">Total volume of formula to be administered for 
                        <?php $patientData->display_firstName(); ?> <span class="text-danger">
                        <?php $patientData->display(); ?> ML</span> amount today! 
                    </p>
                </blockquote>
                <?php
            }
            else
            {
                echo '<p class="error"> Please enter numeric vlaue only</p>';
            }
        }
        else
        {
            echo '<p class="error"> You must enter all field data.</p>';
        }
    }

?>

    <div class="card my-5">
        <div class="card-header font-weight-bold">
            Patient Parameter
        </div>
        <div class="card-body">
        
            <!--- Use bootstrap client-side validation -->
            
            <form class="was-validated"  id="multipleForm" enctype="multipart/form-data" method="post" 
                action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="bg-lignt w-50 p-2 m-3">
                <div class="form-group row">
                    <label for="firstname" class="col-sm-2 col-form-label p-2">First Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="firstname" name="firstname" 
                            pattern="^([A-Za-z]+[,.]?[ ]?|[A-Za-z]+['-]?)+$" required value="<?php 
                            if (!empty($first_name)) echo $first_name; ?>" />
                        <div class="invalid-feedback">First name letter only is required</div>
                    </div>
                    
                </div>
                <div class="form-group row">
                    <label for="lastname" class="col-sm-2 col-form-label p-2">Last Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="lastname"name="lastname" 
                            pattern="^([A-Za-z]+[,.]?[ ]?|[A-Za-z]+['-]?)+$" required value="<?php 
                            if (!empty($last_name)) echo $last_name; ?>" />
                            <div class="invalid-feedback">Last name letter only is required</div>
                    </div>
                </div>
                <div class="form-group form-inline ml-n3">
                    <label class="col-sm-2 col-form-label ml-n3" for="gender">Gender</label>
                    <div class="col-sm-10">
                        <select class="custom-select ml-3" id="gender" name="gender">
                            <option selected>Choose...</option>
                            <option value="Female" <?php if (!empty($gender) && $gender == 'Female') 
                        echo 'selected = "selected"'; ?>>Female</option>
                            <option value="Male" <?php if (!empty($gender) && $gender == 'Male') 
                        echo 'selected = "selected"'; ?>>Male</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="startdate" class="col-sm-2 col-form-label p-2">Start Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control"  id="startdate"  name="startdate" required value="<?php 
                            if (!empty($startdate)) echo $startdate; ?>" />
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="dr_order" class="col-sm-2 col-form-label p-2">Dr. Order</label>
                    <div class="col-sm-10 ">
                       <input type="number" step="0.001" class="form-control" id="dr_order" required 
                               name="dr_order" value="<?php if (!empty($dr_order)) echo $dr_order; ?>" />
                       <div class="invalid-feedback">Dr. order requires in number</div>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="jevity" class="col-sm-2 col-form-label p-2">Jevity</label>
                    <div class="col-sm-10">
                        <input type="number" step="0.001" class="form-control" id="jevity" required
                            name="jevity" value="<?php if (!empty($jevity)) echo $jevity; ?>" />
                            <div class="invalid-feedback">Jevity intake requires in number</div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nurse_name" class="col-sm-2 col-form-label p-2">Nurse</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nurse_name"name="nurse_name"
                            pattern="^([A-Za-z]+[,.]?[ ]?|[A-Za-z]+['-]?)+$" value="<?php 
                            if (!empty($nurse_name)) echo $nurse_name; ?>" />
                        <div class="valid-feedback">Nurse name or intial (optional)</div>
                    </div>
                </div>
                
                <div class="form-group row mx-auto">
                    <div class="col-sm-10 m-3">
               
                        <button type="submit" name="submit" class="btn btn-info mt-3 ml-5 px-3 w-100" 
                            data-targer="multipleForm">
                            Total Volume</button>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>

<?php
     require_once('footer.php');
?>

