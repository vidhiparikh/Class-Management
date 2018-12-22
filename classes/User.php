<?php
	include_once("Database.php");
	require_once("Session.php");
	require_once("Functions.php");
	class User{
        private $connection;
        public function __construct(){
            global $database;
            $this->connection=$database->getConnection();
            Session::startSession();
        }
		/**************************************************************
		*The below function is used to log in the user
		*It automatically assigns the session attributes
		*It is the responsibility of the CALLER to start the session
		*returns true if credentials were correct otherwise false.
		*************************************************************/
		public function processLogin($email, $password){
			
			/*
			$query = "SELECT * FROM members WHERE mmember_email = '$email'";
			$select_user = mysqli_query($this->connection,$query);
			while($row=mysqli_fetch_assoc($select_user)){
				extract($row);
			}*/
			
			$query = "SELECT * FROM members WHERE member_email = ?";
			$preparedStatement = $this->connection->prepare($query);
			$preparedStatement->bind_param("s", $email);//s stands for string,i for integer,d for double, b for blob.
			$preparedStatement->execute();
			
			$preparedStatement->store_result();//database ke saare columns locally leke aayega.method of php 7
			
			$count = $preparedStatement->num_rows;//store_result chala to hi num_rows will display value.
			if($count==1){
				$preparedStatement->bind_result($id, $member_email, $member_password, $member_role, $member_name, $created_at, $updated_at);
				$preparedStatement->fetch();
				if($password === $member_password){
					$_SESSION['login'] = true;
					$_SESSION['member_name']=$member_name;
					$_SESSION['member_id'] = $id;
					$_SESSION['member_role'] = $member_role;
					return true;
				}else{
					return false;
				}
			}//method of php 7
			
		}
		
		public function get_session(){
			return $_SESSION['login'];
		}
		
		public function user_logout(){
			$_SESSION['login'] = false;
            $_SESSION['member_name']=null;
            $_SESSION['member_id'] = null;
            $_SESSION['member_role'] = null;
			session_destroy();
		}
		public static function checkActiveSession(){
		    if(!Session::isSessionStart())
		        Functions::redirect("new_login.php");
        }
	}
?>