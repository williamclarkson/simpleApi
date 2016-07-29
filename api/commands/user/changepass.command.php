<?php

if (file_exists("../basecommand.php"))
{
	include("../basecommand.php");
}

class changepass extends basecommand
{
	
	public function changepass()
	{
		parent::__construct();
	}
	public function execute($userString,$oldPass,$pass)
	{
		$userArray=explode("_",$userString);
		$userID=$userArray[1];
		

		$user=new users_User($userID);
		
		$currentPass=$user->password;
		
		if (md5($oldPass)!=$currentPass)
		{
			$stat=array("stat"=>false,"msg"=>"Old Password not correct".$currentPass);	
			
		}
		else
		{
			if ($user->session!=$userArray[0])
			{
				//echo "session not correct";	
				$stat=array("stat"=>false,"msg="=>"Session not correct");		
			}
			else
			{			
				if ($user->updatePassword(md5($pass))>0)
				{
					$stat=array("stat"=>true,"msg="=>"password changed");	
				}
				else
				{
					$stat=array("stat"=>false,"msg="=>"info not correct");	
				}
			}
		}
		$this->display($stat);
	}
}

?>