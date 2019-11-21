<?php 
    class Database{
        private $host;
        private $username;
        private $password;
        private $database;
        private $connection;

        public function __construct(){
            $this->host = "remotemysql.com";
            $this->username = "kkJeRtnUZL";
            $this->password = "oCoSYIDods";
            $this->database = "kkJeRtnUZL";
            $this->connectDB();
        }
        
        /*NOTE: PHP does not support OVERLOADING!*/
        
        public function connectionString($host, $username, $password, $database){
            $this->host = $host;
            $this->username = $username;
            $this->password = $password;
            $this->database = $database;
        }

        public function connectDB(){
            $this->connection = new mysqli($this->host, $this->username, $this->password);
            
            /*if($this->connection->errno){
                #if the connection is not successful
                die("<h2 class='text-center'>Connection Failed : " . $this->connection->connect_error . "</h2>");
            }*/
            
            if(mysqli_connect_error()){
                #if the connection is not successful
                die("<h2 class='text-center'>Connection Failed : " . mysqli_error() . "</h2>");
            }

            
            $db_selected = $this->connection->select_db($this->database);

            if(!$db_selected){

                /*
                # THE FOLLOWING CODE IS DONE FOR DEPLOYING THE OPEN SOURCE PROJECTS
                # IT SHOULD AUTOMATICALLY CREATE DATABASE, TABLES AND DUMMY VALUES

                $query = "CREATE DATABASE classmanagement";
                if(mysqli_query($this->connection, $query)){
                    CREATE THE TABLES
                    INSERT DUMMY VALUES
                }
            */

                //echo "Database Selection Failed";
            }
            else{
             
            }
            //return $this->connection;
        }

        public function query($sql){
            $result =mysqli_query($this->connection,$sql);
            if(!$result){
                die("Query Failed! " .$sql );
            }
            return $result;
        }
        
        public function escape_string(){
            $escaped_string = $this->connection->real_escape_string($string);
            return $escaped_string;
        }
        
        public function getConnection(){
            return $this->connection;
        }
		
		public function getUserWithCondition($scondn,$key){
		$sql="select * from users where $condn='$key'";
		
		}
        
        function __destruct(){
            //this is destructor
        }
    }


$database = new Database();

?>
