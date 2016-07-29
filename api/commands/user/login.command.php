<?php
session_start();

if (file_exists("../basecommand.php"))
{
	include("../basecommand.php");
}
class login extends basecommand
{
	
	public function login()
	{
		parent::__construct();
	}
	public function execute($username,$pass)
	{
		if ($pass=="" || $username=="")
		{
			$rt=array("stat"=>-1,"msg"=>"missing userName or password");

		}
		else
		{
			$login=new users_Login($username,$pass);
			$stat=$login->check();
			
			$_SESSION['userSession']=$login->sess;
			if ($stat==-1)
			{
				$rt=array("stat"=>-1,"msg"=>"Bad username or password");
			}
			else
			{
				$rt=array("stat"=>$stat,"session"=>$login->sess,"userName"=>$login->userName,"userID"=>$login->id);
			}
		}
		$this->display($rt);
		
	}
}




?>