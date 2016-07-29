<?php

class users_Login
{
	private $email;
	private $pass;
	public $msg;
	
	public $sess;
	public $avatar;
	//public $user;
	public $id;
	public $userName;

	public function users_Login($email,$pass)
	{		
		$this->email=urldecode($email);
		$this->pass=$pass;			
	}
	public function check()
	{
		
		if ($this->email=="" || $this->pass=="")
		{
			$this->msg="user names and passwords can not be blank";
			return 0;
		}
		/**
		 * Establish a DB connection.
		*/
		$database = new db_Database();
	
		$database->query("select userName,id,lastLog, session from users where email=:email and pass=:pass");
		$database->bind(":email",$this->email);
		$database->bind(":pass",md5($this->pass));
		$set=$database->resultset();

		$rc=$database->rowcount();
		if ($rc==0)
		{
			return -1;
		}

		
		$id=$set[0]['id'];
		
		$this->id=$id;
		$this->sess=$set[0]['session']."_".$this->id;
		$this->userName=$set[0]['userName'];
		
		//$this->user=new users_User();
		//$this->user->fillByEmail($this->email);		
				
		$now=time();
		$last=$set[0]['lastLog'];
	//	echo $last;
		
		$elapsed=$now-$last;
		
		$expire=60*60*24*2;
		
		$this->id=$id;
		//$_SESSION['userSession']=$this->sess;
		
		if ($database->rowcount()>0)
		{
			
			if ($elapsed>$expire)
			{
		
				$s=$this->id."-".time();
				$this->sess=md5($s);
		
			
			
			$this->msg="ok";
			//$myTime= date('Y-m-d H:i:s', time());
			
			$database->query("update users set lastLog=:myTime, session=:sess where id=:id");
			$database->bind(":id",$id);
			$database->bind(":sess",$this->sess);
			$database->bind(":myTime",date("Y-m-d H:i:s"));
			$database->execute();		
				
		
			
			//echo $database->q;
			
			return 1;
		}
		else
		{
			$database->query("update users set lastLog=:myTime where id=:id");
			$database->bind(":id",$id);
			$database->bind(":myTime",date("Y-m-d H:i:s"));
			$database->execute();		
			$this->msg="ok";
			return 1;
		}
		}
		else
		{
			$this->msg="Wrong user name or password";
			return 0;
		}
	}
		
}







?>