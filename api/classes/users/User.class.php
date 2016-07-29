<?php

class users_User
{
	public $id;
	public $userCode;	
	public $userName;
	public $email;
	public $password;	
	public $session;
	public $avatar;
	
	public function users_User($id="")
	{
		
		$this->id=$id;
		if ($id!="")
		{
			$this->fillInfo();
		}
	}
	public function getPublicInfo()
	{
		return array("id"=>$this->id,"userName"=>$this->userName,"avatar"=>$this->avatar);
	}
	private function fillInfo()
	{
		/**
   		  * Establish a DB connection.
   		 */
		$database = new db_Database();

		$database->query("select * from users where id=:id");
		$database->bind(":id",$this->id);
		$set=$database->resultset();
		
		$this->password=$set[0]['pass'];
		$this->userName=$set[0]['userName'];		
		$this->email=$set[0]['email'];		
		$this->session=$set[0]['session'];
		$this->avatar=$set[0]['avatar'];
		
	}
	public function fillBySession($sess)
	{
		$database = new db_Database();

		$database->query("select * from users where session=:sess");
		$database->bind(":sess",$sess);
		$set=$database->resultset();		
		
		if ($database->rowcount()>0)
		{
		$this->password=$set[0]['pass'];
		$this->userName=$set[0]['userName'];	
		$this->userCode=$set[0]['userCode'];
		
		$this->email=$set[0]['email'];				
		$this->id=$set[0]['id'];
		
		
		
		return 1;
		
		}
		else
		{
			//session expired
			return 0;
			
		}
				
	}

	
	public function fillByEmail($email)
	{
		$this->email=$email;
		$database = new db_Database();

		$database->query("select * from users where email=:email");
		$database->bind(":email",$email);
		$set=$database->resultset();
		$this->userCode=$set[0]['userCode'];
		$this->userName=$set[0]['userName'];
		$this->id=$set[0]['id'];
		
		if ($this->userCode!="")
		{
		 //   $this->fillInfo();
			return 1;
		}
		
		return 0;
		
	}
	
	
	public function updateAvatar($avatar)
	{
		$this->avatar=$avatar;
		$database = new db_Database();
		$database->query("update users set avatar=:avatar where id=:userID");
		
		$database->bind(":userID",$this->id);
		$database->bind(":avatar",$avatar);
		//echo $database->q;
		$database->execute();
	}
	public function updatePassword($pass)
	{
		$database = new db_Database();
		$database->query("update users set pass=:pass where id=:userID");
		$database->bind(":userID",$this->id);
		$database->bind(":pass",$pass);
		$database->execute();
		//echo $database->q;
		return $database->rowCount();
	}
	public function saveNewUser()
	{
		/**
   		  * Establish a DB connection.
   		 */
		 
		
		 $date=date("Y-m-d H:i:s");
		// $time= date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $date)));
		 
		$database = new db_Database();
		
		//$database->query("select * from users");
		
		$database->query("insert into users (email,pass,userName,signUpTime) VALUES(:email,:pass,:userName,:signUpTime)");
		
		
		$pass=md5($this->password);
		if ($this->password=="")
		{
			$pass="-1";	
		}
		$database->bind(":email",$this->email);
		$database->bind(":pass",$pass);
		
		$database->bind(":userName",$this->userName);
		$database->bind(":signUpTime",$date);
	
	//	echo $database->q;
		
		$database->execute();
		
		$database->query("select * from users");
		$database->execute();
		
		
		
		$database->query("select id from users where email=:email");
		$database->bind(":email",$this->email);
		$result=$database->resultset();
		
		$id2=$result[0]['id'];
		$this->userID=$id2;
		
		$myCode=$id2.$this->userName.$this->email;
		$myCode=md5($myCode);
		//file_put_contents("newUser.txt",$this->userName);
		
		$pubCode=$this->email.$id2;
		$pubCode=md5($pubCode);
		
		//echo "update user code ";
		//$database3 = new db_Database();
		$database->query("update users set userCode=:myCode where id=:id");
		$database->bind(":myCode",$myCode);
		$database->bind(":id",$id2);
		$database->execute();
		
		$this->userCode=$myCode;
		
		
	}
}

?>