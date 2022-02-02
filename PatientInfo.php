<?php
    class PatientInfo {
        private $first_name;
        private $last_name;
        private $startdate;
        private $gender;
        private $dr_order;
        private $jevity;
        private $nurse_name;
        private $total_volume;
       
        // Getter
        public function getFirst_name() 
        {
            return $this->first_name;
        }
       
        public function getLast_name() 
        {
            return $this->last_name;
        }
       
        public function getStartdate() 
        {
            return $this->startdate;
        }
       
        public function getGender() 
        {
            return $this->gender;
        }
        
         public function getDr_order() 
        {
            return $this->dr_order;
        }
       
        public function getJevity() 
        {
            return $this->jevity;
        }
        
        public function getNurse_name() 
        {
            return $this->nurse_name;
        }
       
        public function getTotal_volume() 
        {
            return $this->total_volume;
        }
       
 
        // Setter
        public function setFirst_name($first_name) 
        {
            $this->first_name = $first_name;
        }
       
        public function setLast_name($last_name) {
            $this->last_name = $last_name;
        }
       
        public function setStartdate($startdate) 
        {
            $this->startdate = $startdate;
        }
        
        public function setGender($gender) 
        {
            $this->gender = $gender;
        }
        
        public function setDr_order($dr_order) 
        {
            $this->dr_order = $dr_order;
        }
        
        public function setJevity($jevity) 
        {
            $this->jevity = $jevity;
        }
        
        public function setNurse_name($nurse_name) 
        {
            $this->nurse_name = $nurse_name;
        }
        
        public function setTotal_volume($total_volume) 
        {
            $this->total_volume = $total_volume;
        }
       
        // Calculat total volume of tube feeding 
        public function totalTubeFeeding()
        {
            $this->total_volume = 0;
            
            // One can amount jevity(1can=237ml) 
            $this->total_volume = ($this->jevity * 237) / $this->dr_order;
            $this->total_volume = round($this->total_volume, 2); 
        }
        
        // Display the total volume
        public function display()
        {
            echo $this->total_volume;   
        }
        
        public function display_firstName()
        {
            echo $this->first_name;
        }
       
        // Insert into the database 
        public function insertPatientInfo() 
        {
            // Connect to the database
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                   or die("Error connecting to DB_NAME server.");
                   
            $query = "INSERT INTO tube_feeding (user_id, first_name, last_name, startdate, gender, dr_order, jevity, nurse_name,
                     tube_feed_date, total_volume) VALUES ('" . $_SESSION['user_id'] . "', '$this->first_name', 
                     '$this->last_name', '$this->startdate', '$this->gender', '$this->dr_order', '$this->jevity', 
                     '$this->nurse_name', curdate(), '$this->total_volume')";
              
            $result = mysqli_query($dbc, $query)
                    or die('Error querying database.');

            mysqli_close($dbc);
        }

    }
?>


