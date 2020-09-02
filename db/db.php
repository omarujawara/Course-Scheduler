<?php 
    class db extends mysqli {
        private $servername = "localhost";
        private $username = "root";
        private $password = "";
        private $dbname = "course_schedule";
        
        public function __construct(){
            parent :: __construct($this->servername,$this->username,$this->password,$this->dbname);
            // Check connection
            if ($this->connect_error) {
                die("Connection failed: " . $this->connect_error);
            }
            // echo "Connected successfully";
            }
            
            public function getDataFromTable(){
                try {
                    $query = "SELECT CONCAT(course_ID,'-',section_ID) AS course, room_num from $this->dbname.schedule";
                    $result = $this->query($query);
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            $data[] = $row;
                        }
                    }
                    else{
                        throw new Exception("Data fetch not successful from table");
                    }
                    echo json_encode($data);
                } catch (Exception $e) {
                    echo 'Caught exception: ',  $e->getMessage(), "\n";
                }
            }

            public function insert($section,$course,$room){
                try {
                    $query = "INSERT INTO $this->dbname.schedule VALUE ('$section','$course','$room')";
                    $result = $this->query($query);
                    if(!$result){
                        throw new Exception("Data not inserted in table");
                    }
                } catch (Exception $e) {
                    echo 'Caught exception: ',  $e->getMessage(), "\n";
                }

            }

            public function clear(){
                try {
                    $query ="DELETE FROM course_schedule.schedule WHERE section_ID <> ''";
                    $result = $this->query($query);
                    if(!$result){
                        throw new Exception("Table not cleared");
                    }
                } catch (Exception $e) {
                    echo 'Caught exception: ',  $e->getMessage(), "\n";
                }
            }
    }

    
    
?>