<?php

class users_SignUp
{
	public $userCode;
	private $user;
	public $msg="";

	public function users_SignUp()
	{
		
		
	}	
	public function signUp($userName,$email,$pass)
	{
		
		$this->user=new users_User();
		
		$this->user->userName=$userName;
		$this->user->password=$pass;
		$this->user->email=$email;		
		
	}
	
	public function save()
	{
		
		/**
   		  * Establish a DB connection.
   		 */
		// echo "check for email";
		 
		$database = new db_Database();

		$database->query("select * from users where email=:email");
		$database->bind(":email",$this->user->email);
		$database->execute();
		
		if ($database->rowCount()>0)
		{
			$this->msg="an account with the email ".$this->user->email." already exists";
			return 0;
		}
		
		$database->query("select * from users where userName=:userName");
		$database->bind(":userName",$this->user->userName);
		$database->execute();
		if ($database->rowCount()>0)
		{
			$this->msg="an account with the user name ".$this->user->userName." already exists";
			return 0;
		}
		
		$this->user->saveNewUser();
		$this->userCode=$this->user->userCode;
		return 1;
	}
	
}




?>