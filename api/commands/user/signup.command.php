<?php
if (file_exists("../basecommand.php"))
{
	include("../basecommand.php");
}
class signup extends basecommand
{
	public function signup()
	{
		$this->paramCount=3;
		$this->paramNames="userName,email,pass";
    }
	
	public function execute($userName,$email,$pass)
	{		
		$signUp=new users_SignUp();
		$signUp->signUp($userName,$email,$pass);
		$stat=$signUp->save();
		$rt=array("stat"=>$stat,"msg"=>$signUp->msg);
		$this->display($rt);
		
	}
	
}


?>