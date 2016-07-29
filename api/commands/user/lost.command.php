<?php
if (file_exists("../basecommand.php"))
{
	include("../basecommand.php");
}
class lost extends basecommand
{
	public function lost()
	{
		
    }
	
	public function execute($email)
	{		
	
		
		$user=new users_User();
		$stat=$user->fillByEmail($email);

		if ($stat==1)
		{
			$passReset=new users_PasswordReset();
			$newPass=$passReset->reset($user);

			//DO NOT PASS THE NEW PASSWORD BACK TO THE CLIENT IN PRODUCTION!
			//USED HERE FOR DEMO ONLY

			$rt=array("msg"=>"Password Reset ".$newPass,"stat"=>1);
			//TODO email user here with new password
		}
		else
		{
			$rt=array("msg"=>"No such email","stat"=>0);

		}
		
		$this->display($rt);
	}
	
}


?>