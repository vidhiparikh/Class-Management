<?php
	class Database{
		private $host;
		private $username;
		private $password;
		private $database;
		private $connection;
		
		//this is used to create a default consstructor.
		public function __construct(){
		$this->host = "localhost";
		$this->username="vidhi";
		$this->password="vidhi123";
		$this->database="classmanagement";
		$this->connectDB();
		}
		//NOTE: PHP doesn't suppport Overloading!
		public function connectionString($host,$username,$password,$database){
		$this->host = $host;
		$this->username=$username;
		$this->password=$password;
		$this->database=$database;
		}
		public function connectDB(){
			$this->connection=new mysqli($this->host, $this->username, $this->password);
			if(mysqli_connect_error()){//returns errno
				//if the connection is not successful
				die("Connection failed :".mysqli_error());
				//die("Connection failed! : ".mysqli_connect_error());//displays error when the connection fails to establish
			}
			$db_selected =$this->connection->select_db($this->database);
			if(!$db_selected){
				/*$query = "CREATE DATABASE classmangement";
				if(mysqli_query($this->connection,$query)){
					echo "Database created successfully";
				}*/
				//whenever we deploy, we create the database with blank tables for the convenience of the client ans also insert some dummy values into it.this is the basic practice of open source development.
				echo "No such database found!";
			}else{
			}
			//return $this->connection;
		}
		
		public function query($sql){
			$result=$this->connection->query($sql);
			if(!$result){
				die("Query failed: ".$sql);
			}
			return $result;
		}
		public function getConnection(){
			return $this->connection;
		}
		public function esacape_string($string){
			$escaped_string=$this->connection->real_escape_string($string);
			return $escaped_string;
		}
		//this is used to create destructor
		function __destruct(){
			
		}
	}

$database = new Database();
?>